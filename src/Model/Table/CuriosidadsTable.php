<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Curiosidads Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Categorias
 * @property \Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Curiosidad get($primaryKey, $options = [])
 * @method \App\Model\Entity\Curiosidad newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Curiosidad[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Curiosidad|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Curiosidad patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Curiosidad[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Curiosidad findOrCreate($search, callable $callback = null, $options = [])
 */
class CuriosidadsTable extends Table
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

        $this->setTable('curiosidads');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Categorias', [
            'foreignKey' => 'categoria_id'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
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
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('titulo');

        $validator
            ->allowEmpty('curiosidad');
        $validator
            ->allowEmpty('fuente');

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
        $rules->add($rules->existsIn(['categoria_id'], 'Categorias'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
