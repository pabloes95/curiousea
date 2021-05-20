<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \Cake\ORM\Association\HasMany $Articulos
 * @property \Cake\ORM\Association\HasMany $Comentarios
 * @property \Cake\ORM\Association\HasMany $Curiosidads
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Articulos', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Comentarios', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Curiosidads', [
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
            ->notEmpty('username','El nombre de usuario es obligatorio');

        $validator
            ->notEmpty('password','La contraseña es obligatoria');

        $validator
            ->email('email')
            ->allowEmpty('email');

        $validator
            ->notEmpty('role', 'Rol no seleccionado')
            ->add('role', 'inList', [
            'rule' => ['inList', ['admin', 'autor', 'usuario']],
            'message' => 'Por favor selecciona un rol valido'
            ]);



        $validator
            ->allowEmpty('nombre');

        $validator
            ->allowEmpty('apellidos');

        $validator
            ->dateTime('fecha_nacimiento')
            ->allowEmpty('fecha_nacimiento');

        $validator
            ->boolean('activo')
            ->allowEmpty('activo');

        $validator
            ->allowEmpty('imagen');

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
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }
}
