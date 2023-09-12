<?php declare(strict_types=1);

final class Email
{
    private string $endereco;

    public function __construct(string $endereco)
    {
        self::validar($endereco);
        $this->endereco = $endereco;
    }

    public function getEndereco(): string
    {
        return $this->endereco;
    }

    public function getUsuario(): string
    {
        return
        explode("@", $endereco)[0];
    }

    private static function validar(string $endereco)
    {
        // Validação burra, apenas verifica se a srting contém um @
        if (!str_contains($endereco, '@')) {
            throw new InvalidArgumentException(
                "Endereço de e-mail inválido: '$endereco'."
            );
        }
    }
}