<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * GmbInsightOutletData Entity
 *
 * @property int $id
 * @property int|null $master_outlet_id
 * @property int|null $outlet_id
 * @property int|null $search_views
 * @property int|null $total_views
 * @property int|null $visit_website
 * @property int|null $total_phone_call
 * @property int|null $queries_direct
 * @property int|null $queries_indirect
 * @property int|null $views_maps
 * @property int|null $views_search
 * @property int|null $request_directions
 * @property \Cake\I18n\FrozenDate|null $cron_date
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property string|null $location_name
 * @property string|null $location_id
 *
 * @property \App\Model\Entity\MasterOutlet $master_outlet
 * @property \App\Model\Entity\Outlet $outlet
 * @property \App\Model\Entity\Location $location
 */
class GmbInsightOutletData extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'master_outlet_id' => true,
        'outlet_id' => true,
        'search_views' => true,
        'total_views' => true,
        'visit_website' => true,
        'total_phone_call' => true,
        'queries_direct' => true,
        'queries_indirect' => true,
        'views_maps' => true,
        'views_search' => true,
        'request_directions' => true,
        'cron_date' => true,
        'created' => true,
        'modified' => true,
        'location_name' => true,
        'location_id' => true,
        'master_outlet' => true,
        'outlet' => true,
        'location' => true,
    ];
}
