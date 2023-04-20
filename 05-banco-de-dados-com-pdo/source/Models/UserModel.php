<?php

namespace Source\Models;

/**
 * Class UserModel
 * @package Source\Models
 */
class UserModel extends Model
{
    /** @var array $safe no update or create */
    protected static $safe = ["id", "created_at", "updated_at"];

    /** @var string $entity database table */
    protected static $entity = "users";

    /**
     * @param string $firstName
     * @param string $lastName
     * @param string $email
     * @param string|null $document
     * @return null|UserModel
     */
    public function bootstrap(string $firstName, string $lastName, string $email, string $document = null): ?UserModel
    {
        $this->firstName    = $firstName;
        $this->lastName     = $lastName;
        $this->email        = $email;
        $this->document     = $document;
        return $this;
    }

    /**
     * @param int $id
     * @param string $columns
     * @return null|UserModel
     */
    public function load(int $id, string $columns = "*"): ?UserModel
    {
        $load = $this->read("SELECT {$columns} FROM " . self::$entity . " WHERE id = :id", "id={$id}");
        if ($this->fail() || !$load->rowCount()) {
            $this->message = "Usuário não encontrado para o id informado";
            return null;
        }
        return $load->fetchObject(__CLASS__);
    }

    /**
     * @param $email
     * @param string $columns
     * @return null|UserModel
     */
    public function find($email, string $columns = "*"): ?UserModel
    {
        $find = $this->read("SELECT {$columns} FROM " . self::$entity . " WHERE email = :email", "email={$email}");
        if ($this->fail() || !$find->rowCount()) {
            $this->message = "Usuário não encontrado para o email informado";
            return null;
        }
        return $find->fetchObject(__CLASS__);
    }

    /**
     * @param int $limit
     * @param int $offset
     * @param string $columns
     * @return array|null
     */
    public function all(int $limit = 30, int $offset = 0, string $columns = "*"): ?array
    {
        $all = $this->read("SELECT {$columns} FROM " . self::$entity . " LIMIT :l OFFSET :o", "l={$limit}&o={$offset}");
        if ($this->fail() || !$all->rowCount()) {
            $this->message = "Sua consulta não retornou usuários";
            return null;
        }
        return $all->fetchAll(\PDO::FETCH_CLASS, __CLASS__);
    }

    /**
     * @return null|UserModel
     */
    public function save()
    {   
        /**User Update */
        if(!empty($this->id)){
            $userId = $this->id;
        }
        /**User Insert */
        if(empty($this->id)){
            if($this->find($this->email)){
                $this->message = "O E-mail informado já está Cadastrado";
                return null;
            }

            $userId = $this->create(self::$entity, $this->safe());
            if($this->fail()){
                $this->message = "Erro ao Cadastrar, verificque seus dados";
            }
            $this->message = "Cadastro Realizado com Sucesso";
        }
        $this->data = $this->read("SELECT * FROM " . self::$entity . " WHERE id = :id", "id={$userId}")->fetch();
        return $this;
    }

    /**
     * @return null|UserModel
     */
    public function destroy(): ?UserModel
    {
        
    }

    /**
     * @return bool
     */
    private function required(): bool
    {
        
    }

}
