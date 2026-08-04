<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_basic_test(): void
    {
        $response = $this->get('/');

        // Este teste vai passar (por enquanto) foi alterado para 200, mas vamos quebrar ele depois
        $response->assertStatus(200);
    }

    // Vamos adicionar um teste que vamos quebrar propositalmente
    public function test_math_operation(): void
    {
        $result = 2 + 2;

        // Mudamos de 4 para 5 para quebrar
        $this->assertEquals(5, $result);  // ❌ Vai falhar!
    }
}
