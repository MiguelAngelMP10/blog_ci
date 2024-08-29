<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 *
 */
class User extends Model
{
    /**
     * @var string
     */
    protected $table = 'users';
    /**
     * @var string
     */
    protected $primaryKey = 'id';
    /**
     * @var bool
     */
    protected $useAutoIncrement = true;
    /**
     * @var string
     */
    protected $returnType = 'array';
    /**
     * @var bool
     */
    protected $useSoftDeletes = false;
    /**
     * @var bool
     */
    protected $protectFields = true;
    /**
     * @var string[]
     */
    protected $allowedFields = ['email', 'password', 'name', 'surnames', 'gender', 'date_of_birth'];

    /**
     * @var bool
     */
    protected bool $allowEmptyInserts = false;
    /**
     * @var bool
     */
    protected bool $updateOnlyChanged = true;

    /**
     * @var array
     */
    protected array $casts = [];
    /**
     * @var array
     */
    protected array $castHandlers = [];

    // Dates
    /**
     * @var bool
     */
    protected $useTimestamps = false;
    /**
     * @var string
     */
    protected $dateFormat = 'datetime';
    /**
     * @var string
     */
    protected $createdField = 'created_at';
    /**
     * @var string
     */
    protected $updatedField = 'updated_at';
    /**
     * @var string
     */
    protected $deletedField = 'deleted_at';

    // Validation
    /**
     * @var array
     */
    protected $validationRules = [
        'email' => ['required|max_length[254]|valid_email'],
        'password' => 'required|min_length[8]|max_length[255]',
        'name' => 'required|string|max_length[100]',
        'surnames' => 'required|string|max_length[100]',
        'gender' => 'required|in_list[male,female,other]',
        'date_of_birth' => 'required|valid_date',
    ];
    /**
     * @var array
     */
    protected $validationMessages = [];
    /**
     * @var bool
     */
    protected $skipValidation = false;
    /**
     * @var bool
     */
    protected $cleanValidationRules = true;

    // Callbacks
    /**
     * @var bool
     */
    protected $allowCallbacks = true;
    /**
     * @var array
     */
    protected $beforeInsert = [];
    /**
     * @var array
     */
    protected $afterInsert = [];
    /**
     * @var array
     */
    protected $beforeUpdate = [];
    /**
     * @var array
     */
    protected $afterUpdate = [];
    /**
     * @var array
     */
    protected $beforeFind = [];
    /**
     * @var array
     */
    protected $afterFind = [];
    /**
     * @var array
     */
    protected $beforeDelete = [];
    /**
     * @var array
     */
    protected $afterDelete = [];

    /**
     * @param $email
     * @return object|array|null
     */
    public function getUser($email): object|array|null
    {
        return $this->where('email', $email)->first();
    }
}
