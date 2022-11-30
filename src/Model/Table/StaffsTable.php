<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Composer\DependencyResolver\Rule;
use SoftDelete\Model\Table\SoftDeleteTrait;

/**
 * Staffs Model
 *
 * @property \App\Model\Table\RolesTable&\Cake\ORM\Association\BelongsTo $Roles
 * @property \App\Model\Table\RolesTable&\Cake\ORM\Association\BelongsTo $Categories

 * @property \App\Model\Table\TicketAssignTable&\Cake\ORM\Association\HasMany $TicketAssign
 * @property \App\Model\Table\TicketsTable&\Cake\ORM\Association\HasMany $Tickets
 *
 * @method \App\Model\Entity\Staff newEmptyEntity()
 * @method \App\Model\Entity\Staff newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Staff[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Staff get($primaryKey, $options = [])
 * @method \App\Model\Entity\Staff findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Staff patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Staff[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Staff|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Staff saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Staff[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Staff[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Staff[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Staff[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class StaffsTable extends Table
{
//    soft delete
//    use SoftDeleteTrait;
//    protected $softDeleteField = 'deleted_date';
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('staffs');
        $this->setDisplayField('staffName');
        $this->setPrimaryKey('id');

        $this->belongsTo('Roles', [
            'foreignKey' => 'role_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('TicketAssign', [
            'foreignKey' => 'staff_id',
        ]);
        $this->hasMany('Tickets', [
            'foreignKey' => 'staff_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('staffName')
            ->maxLength('staffName', 255)
            ->requirePresence('staffName', 'create')
            ->notEmptyString('staffName');

        $validator
            ->scalar('gender')
            ->maxLength('gender', 255)
            ->requirePresence('gender', 'create')
            ->allowEmptyFile('gender');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

        $validator
            ->scalar('phoneNumber')
            ->maxLength('phoneNumber', 10)
            ->requirePresence('phoneNumber', 'create')
            ->notEmptyString('phoneNumber')

            ->add('phoneNumber','numeric',[
            'message' =>'Phone number must be in number',
            'rule' =>'numeric']);

       $validator
           ->allowEmptyString('profileImage')
           ->add('profileImage', [
               'mimeType' => [
                   'rule' => ['mimeType', ['image/jpg', 'image/png', 'image/jpeg']],
                   'message' => 'Please upload only jpg, jpeg and png',
               ],
               'fileSize' => [
                   'rule' => ['fileSize', '<=', '2MB'],
                   'message' => 'Image file size must be less than 1MB',
               ]
           ]);

        $validator
            ->scalar('username')
            ->maxLength('username', 255)
            ->requirePresence('username', 'create')
            ->notEmptyString('username')
            ->add('username', [
                'pattern' => [
                    'rule' => ['custom' ,  '/^[a-z0-9][a-z0-9_]*[a-z0-9]$/'],
                    'message' => '❌username must have no space, start with lowercase/number and no special character at the end',
                ]
            ]);

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->requirePresence('password', 'create')
            ->notEmptyString('password')
            ->notAsciiAlphaNumeric('password','Password not strong enough')
            ->notAlphaNumeric('password','Not strong')
        ;

        $validator
            ->sameAs('comfirm_password','password','Password matched failed');

        $validator
            ->sameAs('new_password','confirm_new_password','Password matched failed');

        $validator
            ->scalar('role_id')
            ->maxLength('role_id', 255)
            ->notEmptyString('role_id');

        return $validator;
    }
    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['username']), ['errorField' => 'username']);
        $rules->add($rules->existsIn('role_id', 'Roles'), ['errorField' => 'role_id']);
//        $rules->add($rules->existsIn('category_id', 'Categories'), ['errorField' => 'category_id']);

        return $rules;
    }

    public function findByEmail(mixed $email)
    {
    }
}
