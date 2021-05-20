<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Articulos Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $Categorias
 * @property \Cake\ORM\Association\HasMany $Comentarios
 * @property \Cake\ORM\Association\HasMany $Imagens
 * @property \Cake\ORM\Association\BelongsToMany $Etiquetas
 *
 * @method \App\Model\Entity\Articulo get($primaryKey, $options = [])
 * @method \App\Model\Entity\Articulo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Articulo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Articulo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Articulo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Articulo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Articulo findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ArticulosTable extends Table
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

        $this->setTable('articulos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        $this->belongsTo('Categorias', [
            'foreignKey' => 'categoria_id'
        ]);
        $this->hasMany('Comentarios', [
            'foreignKey' => 'articulo_id'
        ]);
        $this->hasMany('Imagens', [
            'foreignKey' => 'articulo_id'
        ]);
        $this->belongsToMany('Etiquetas', [
            'foreignKey' => 'articulo_id',
            'targetForeignKey' => 'etiqueta_id',
            'joinTable' => 'articulos_etiquetas'
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
            ->allowEmpty('cuerpo');

        $validator
            ->boolean('publicado')
            ->allowEmpty('publicado');

        $validator
            ->allowEmpty('imagen');

        $validator
            ->allowEmpty('slug');
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
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['categoria_id'], 'Categorias'));

        return $rules;
    }
}
