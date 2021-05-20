<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ArticulosEtiquetas Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Articulos
 * @property \Cake\ORM\Association\BelongsTo $Etiquetas
 *
 * @method \App\Model\Entity\ArticulosEtiqueta get($primaryKey, $options = [])
 * @method \App\Model\Entity\ArticulosEtiqueta newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ArticulosEtiqueta[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ArticulosEtiqueta|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ArticulosEtiqueta patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ArticulosEtiqueta[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ArticulosEtiqueta findOrCreate($search, callable $callback = null, $options = [])
 */
class ArticulosEtiquetasTable extends Table
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

        $this->setTable('articulos_etiquetas');
        $this->setDisplayField('articulo_id');
        $this->setPrimaryKey(['articulo_id', 'etiqueta_id']);

        $this->belongsTo('Articulos', [
            'foreignKey' => 'articulo_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Etiquetas', [
            'foreignKey' => 'etiqueta_id',
            'joinType' => 'INNER'
        ]);
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
        $rules->add($rules->existsIn(['articulo_id'], 'Articulos'));
        $rules->add($rules->existsIn(['etiqueta_id'], 'Etiquetas'));

        return $rules;
    }
}
