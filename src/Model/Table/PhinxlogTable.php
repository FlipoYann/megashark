<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Phinxlog Model
 *
 * @method \App\Model\Entity\Phinxlog get($primaryKey, $options = [])
 * @method \App\Model\Entity\Phinxlog newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Phinxlog[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Phinxlog|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Phinxlog patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Phinxlog[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Phinxlog findOrCreate($search, callable $callback = null, $options = [])
 */
class PhinxlogTable extends Table
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

        $this->setTable('phinxlog');
        $this->setDisplayField('version');
        $this->setPrimaryKey('version');
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
            ->allowEmpty('version', 'create');

        $validator
            ->scalar('migration_name')
            ->allowEmpty('migration_name');

        $validator
            ->dateTime('start_time')
            ->allowEmpty('start_time');

        $validator
            ->dateTime('end_time')
            ->allowEmpty('end_time');

        $validator
            ->boolean('breakpoint')
            ->requirePresence('breakpoint', 'create')
            ->notEmpty('breakpoint');

        return $validator;
    }
}
