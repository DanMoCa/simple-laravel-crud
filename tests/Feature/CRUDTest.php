<?php

namespace Tests\Feature;

use App\Models\Shark;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class CRUDTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @return void
     *
     * Verify that the resource controller routes are defined in web.php for Shark model and SharkController
     *
     */
    public function test_routes_are_defined(): void
    {
        $this->assertTrue(Route::has('sharks.index'));
        $this->assertTrue(Route::has('sharks.show'));
        $this->assertTrue(Route::has('sharks.create'));
        $this->assertTrue(Route::has('sharks.edit'));
        $this->assertTrue(Route::has('sharks.destroy'));
        $this->assertTrue(Route::has('sharks.store'));
        $this->assertTrue(Route::has('sharks.update'));
    }
    
    /**
     * @test
     * @return void
     *
     * Verify that /sharks returns a list of sharks
     *
     */
    public function test_show_list_of_sharks(): void
    {
        Shark::factory()->create(['name'=>'Shark1']);
        Shark::factory()->create(['name'=>'Shark2']);
        $response = $this->get(route('sharks.index'));

        $response->assertStatus(200)
            ->assertViewHas('sharks')
            ->assertSee('Shark1')
            ->assertSee('Shark2');
    }

    /**
     * @test
     * @return void
     *
     * Verify that /sharks/{shark} shows the information of a single shark
     *
     */
    public function test_shark_show(): void
    {
        $shark = Shark::factory()->create();

        $response = $this->get(route('sharks.show',$shark->id));

        $response->assertStatus(200)
            ->assertViewHas('shark')
            ->assertSee([
                $shark->name,
                $shark->email,
                $shark->level
            ]);
    }

    /**
     * @test
     * @return void
     *
     * Verify that /sharks/create returns the sharks.create view
     *
     */
    public function test_shark_create_form(): void
    {
        $response = $this->get(route('sharks.create'));

        $response->assertStatus(200)
            ->assertSee('Create a shark');
    }

    /**
     * @test
     * @return void
     *
     * Verify that /sharks/edit returns the sharks.edit view
     *
     */
    public function test_shark_edit_form(): void
    {
        $shark = Shark::factory()->create();

        $response = $this->get(route('sharks.edit',$shark->id));

        $response->assertStatus(200)
            ->assertViewHas('shark')
            ->assertSee('Edit '.$shark->name);
    }

    /**
     * @test
     * @return void
     *
     * Verify that POST /sharks stores the shark and redirects to index
     *
     */
    public function test_shark_store(): void
    {
        $data = Shark::factory()->raw();

        $response = $this->post(route('sharks.store'),$data);

        $response->assertStatus(302)
            ->assertRedirectToRoute('sharks.index')
            ->assertSessionHas('message');

        $response = $this->get(route('sharks.index'));

        $response->assertStatus(200)
            ->assertViewHas('sharks')
            ->assertSee($data['name']);
    }

    /**
     * @test
     * @return void
     *
     * Verify that PUT /sharks/{shark} updates the shark and redirects to index
     *
     */
    public function test_shark_update(): void
    {
        $shark = Shark::factory()->create();

        $response = $this->put(route('sharks.update',$shark->id),[
            'name' => 'Sharknado'
        ]);

        $response->assertStatus(302)
            ->assertRedirectToRoute('sharks.index')
            ->assertSessionHas('message');

        $response = $this->get(route('sharks.index'));

        $response->assertStatus(200)
            ->assertViewHas('sharks')
            ->assertSee('Sharknado');
    }

    /**
     * @test
     * @return void
     *
     * Verify that DELETE /sharks/{shark} destroys the shark and redirects to index
     *
     */
    public function test_shark_destroy(): void
    {
        $shark = Shark::factory()->create();

        $response = $this->delete(route('sharks.destroy',$shark->id));

        $response->assertStatus(302)
            ->assertRedirectToRoute('sharks.index')
            ->assertSessionHas('message');

        $response = $this->get(route('sharks.index'));

        $response->assertStatus(200)
            ->assertViewHas('sharks')
            ->assertDontSee($shark->name);
    }
}
