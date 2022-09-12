<?php
namespace App\Controller\Component;

use Cake\ORM\TableRegistry;
use Cake\Controller\Component;
use Cake\Log\Log;
use Cake\Controller\ComponentRegistry;

/**
 * ImportExport component
 */
class ImportExportComponent extends Component
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    public function importFile($file, $validHead)
    {
        $data = [];
        if(!empty($file['name']))
        {
            $ext = substr($file["name"], strrpos($file["name"], "."), (strlen($file["name"]) - strrpos($file["name"], ".")));
            if ($ext == ".csv")
            {
                $data = [];
                //open csv in read only mode
                $csvFile = fopen($file['tmp_name'], 'r');
                //check head row
                $head = fgetcsv($csvFile);
                $headvalidate = $this->validateHead($head,$validHead);

                //return head row error, if available.
                if(!empty($headvalidate))
                {
                    return $headvalidate;
                }

                //checking other rows
                $row = 0;
                $passData = 0;
                while(($line = fgetcsv($csvFile)) !== FALSE)
                {
                    for($k=0; $k< count($line);$k++)
                    {
                        $line[$k] = $this->sanitizeString($line[$k]);
                    }
                    $lines[] =$line; 
                    $row++;
                    $passData++;

                    $validate = $this->validate($row,$passData,$line,$validHead);
                    $error[] = $validate['error'];
                    $passData = $validate['passData'];

                    if(empty($error))
                    {
                        $data = $this->insertData($line);
                    }
                }
                echo $passData." row(s) inserted from total ".$row. " row(s) <br>";

                if($row == 0)
                {
                    $data = "Sheet does not have any Data";
                    return $data;
                }

                /*error export file code*/

                if(isset($error))
                {
                    $this->export($error,$validHead,$lines);
                }

            }

        }

        return $data;
    }


    public function validateHead($head,$validHead)
    {
        $headvalidate = [];
        for($i=0; $i<13; $i++)
        {
            if($validHead[$i] != trim(strtolower($head[$i])))
            {
                $headvalidate[] = "'". $validHead[$i] . "' is missing from column " . $i;
            }
        }
        return $headvalidate;
    }

    public function insertData($line)
    {
        for($i=0; $i<3; $i++)
        {
            $line[] = date('Y-m-d h:i');
        }
        $this->GmbInsightOutletDatas = TableRegistry::get('GmbInsightOutletDatas');
        $data = $this->GmbInsightOutletDatas->query();
        $insert = ['master_outlet_id','outlet_id','search_views','total_views','visit_website','total_phone_call','queries_direct','queries_indirect','views_maps','views_search','request_directions','location_name','location_id','cron_date', 'created','modified'];

        $valueCount = 0;
        foreach($insert as $value)
        {
            $val[$value] = $line[$valueCount];
            $valueCount++;
        }

        $data->insert($insert)
        ->values($val)
        ->execute();

        $message = "Data inserted Successfully";
        return $message;
    }

    public function export($error,$validHead,$lines)
    {
        $validHead[] = "errors";
        $this->autoRender=false;
        $delimiter = ","; 
        $filename = "gmb-insight-outlet-error-sheet_" . date('Y-m-d-h-i-s') . ".csv"; 
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename='.$filename);
        // Log::info($error);
        $i=0;
        foreach($lines as $value)
        {
            $k=$i+1;
            $value[array_key_last($value)+1] = $error[$i][$k];
            $data[]=$value;
            $i++;
        }
        $lines=$data;
        // print_r(implode(',',$data[0][13])); die;
        ob_end_clean();

        Log::info($lines);

        ob_start();
        $output = fopen( 'php://output', 'w' );
        fputcsv($output, $validHead,$delimiter);
                
        foreach($lines as $row)
        { 
            // Log::info($row);
            $lineData = [$row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $row[11], $row[12],implode(', ',$row[13])]; 
            fputcsv($output, $lineData,$delimiter); 
        }
        fclose($output);

        return null;


    }

    public function validate($row,$passData,$line,$validHead)
    {
        //checking for not empty
        for($column=0; $column<count($line); $column++)
        {
            if(empty($line[$column]))
            {
                $error[$row][$column] = "'" . $validHead[$column] . "' field is required"; 
                $er = 1;
            }
        }
        if($er == 1)
        {
            $passData--;
        }
        $validate['error'] = $error;
        $validate['passData'] = $passData;

        return $validate;
    }

    public function setHeaders($filename) {
        // disable caching
        $now = gmdate("D, d M Y H:i:s");
        header("Cache-Control: max-age=0, no-cache, must-revalidate, proxy-revalidate");
        header("Last-Modified: {$now} GMT");
        // force download  
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        // disposition / encoding on response body
        header("Content-Disposition: attachment;filename={$filename}");
        header("Content-Transfer-Encoding: binary");
    }
    
    public function sanitizeString($value) 
    {
        $value = filter_var(trim($value), FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
        return trim($value, ' ');
    }
}

