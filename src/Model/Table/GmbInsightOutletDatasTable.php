<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * GmbInsightOutletDatas Model
 *
 * @property \App\Model\Table\MasterOutletsTable&\Cake\ORM\Association\BelongsTo $MasterOutlets
 * @property \App\Model\Table\OutletsTable&\Cake\ORM\Association\BelongsTo $Outlets
 * @property \App\Model\Table\LocationsTable&\Cake\ORM\Association\BelongsTo $Locations
 *
 * @method \App\Model\Entity\GmbInsightOutletData get($primaryKey, $options = [])
 * @method \App\Model\Entity\GmbInsightOutletData newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\GmbInsightOutletData[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\GmbInsightOutletData|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\GmbInsightOutletData saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\GmbInsightOutletData patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\GmbInsightOutletData[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\GmbInsightOutletData findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class GmbInsightOutletDatasTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('gmb_insight_outlet_datas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('MasterOutlets', [
            'foreignKey' => 'master_outlet_id',
        ]);
        $this->belongsTo('Outlets', [
            'foreignKey' => 'outlet_id',
        ]);
        $this->belongsTo('Locations', [
            'foreignKey' => 'location_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->integer('search_views')
            ->allowEmptyString('search_views');

        $validator
            ->integer('total_views')
            ->allowEmptyString('total_views');

        $validator
            ->integer('visit_website')
            ->allowEmptyString('visit_website');

        $validator
            ->integer('total_phone_call')
            ->allowEmptyString('total_phone_call');

        $validator
            ->integer('queries_direct')
            ->allowEmptyString('queries_direct');

        $validator
            ->integer('queries_indirect')
            ->allowEmptyString('queries_indirect');

        $validator
            ->integer('views_maps')
            ->allowEmptyString('views_maps');

        $validator
            ->integer('views_search')
            ->allowEmptyString('views_search');

        $validator
            ->integer('request_directions')
            ->allowEmptyString('request_directions');

        $validator
            ->date('cron_date')
            ->allowEmptyDate('cron_date');

        $validator
            ->scalar('location_name')
            ->maxLength('location_name', 255)
            ->allowEmptyString('location_name');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['master_outlet_id'], 'MasterOutlets'));
        $rules->add($rules->existsIn(['outlet_id'], 'Outlets'));
        $rules->add($rules->existsIn(['location_id'], 'Locations'));

        return $rules;
    }
}
