<?php declare(strict_types=1);

require __DIR__ . '\..\src\Email.php';

use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;


final class EmailTest extends TestCase
{
    public function EnderecosValidosProvider(): array
    {
        return[
            ['alice@exemplo.com'],
            ['eric@exemplo.net'],
            ['maria@exemplo.org']
        ];
    }
    #[DataProvider('enderecosValidosProvider')]
    public function testCriarComEnderecoValido($endereco): void
    {
        // Ação
        $email = new Email($endereco);

        // Asserção
        $this->assertSame($endereco, $email->getEndereco());
    }

    public function testNaoCriarComEnderecoInvalido(): void
    {
        // Arranjo
        $endereco = 'endereço inválido';

        // Asserção
        $this->expectException(InvalidArgumentException::class);

        // Ação
        $email = new Email($endereco);
    }
}