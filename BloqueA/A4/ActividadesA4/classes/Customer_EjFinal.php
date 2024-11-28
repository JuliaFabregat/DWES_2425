<?php
class Customer
{
    // PROPIEDADES
    public string $forename;
    public string $surname;
    public string $email;
    private string $password;
    public array $accounts;

    // CONSTRUCTORES
    function __construct(string $forename, string $surname, string $email, string $password, array $accounts)
    {
        $this->forename = $forename;
        $this->surname = $surname;
        $this->email = $email;
        $this->password = $password;
        $this->accounts = $accounts;
    }

    function getFullName(){
        return $this->forename . ' ' . $this->surname;
    }
}
?>