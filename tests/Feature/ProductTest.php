<?php

namespace Tests\Feature;

use Tests\TestCase;

class ProductTest extends TestCase
{
    public function test_product_detail_page_renders_successfully(): void
    {
        $response = $this->get('/product/liva-hair-pair-set');

        $response->assertStatus(200);
        $response->assertSee('set-multi-choice-container', false);
        $response->assertSee('luxury-card', false);
        $response->assertSee('set-choice-card', false);
        $response->assertSee('aspect-[4/5]', false);
        $response->assertSee('bg-[#F4F1EA]', false);
        $response->assertSee('/img/payments/khqr.png', false);
        $response->assertSee('gallery-thumb-more-btn', false);
        $response->assertSee('Support KH QR', false);
        $response->assertSee('/img/payments/bakong-khqr-icon.png', false);
        $response->assertSee('t.me/livaskincare', false);
        $response->assertSee('facebook.com/livaskincare', false);
        $response->assertSee('How to use', false);
        $response->assertSee('Description', false);
        $response->assertSee('Customer Reviews', false);
        $response->assertSee('Write a Review', false);
        $response->assertSee('facebook.com/sharer/sharer.php', false);
        $response->assertSee('t.me/share/url', false);
        $response->assertSee('shareProductOnInstagram()', false);
        $response->assertSee('Instagram', false);
    }

    public function test_all_products_dedicated_page_renders_without_modal(): void
    {
        $response = $this->get('/products');

        $response->assertStatus(200);
        $response->assertSee('All Botanical Products', false);
        $response->assertSee('catalog-products-grid', false);
        $response->assertSee('grid-cols-2', false);
        $response->assertSee('Liva Silk Infusion Hair Conditioner', false);
        $response->assertSee('Liva Velvet Nourishing Body Lotion', false);
        $response->assertDontSee('all-products-modal', false);
    }

    public function test_home_page_footer_has_khqr_support_and_floating_social(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Support KH QR', false);
        $response->assertSee('/img/payments/bakong-khqr-icon.png', false);
        $response->assertSee('t.me/livaskincare', false);
        $response->assertSee('facebook.com/livaskincare', false);
        $response->assertSee(route('products.index'), false);
        $response->assertSee('w-[calc(50%-6px)]', false);
        $response->assertDontSee('id="all-products-modal"', false);
    }

    public function test_about_and_contact_pages_render_and_submit_successfully(): void
    {
        $aboutResponse = $this->get('/about');
        $aboutResponse->assertStatus(200);
        $aboutResponse->assertSee('Harvested with Reverence, Perfected by Science', false);

        $contactResponse = $this->get('/contact');
        $contactResponse->assertStatus(200);
        $contactResponse->assertSee('Contact LIVA Concierge', false);
        $contactResponse->assertSee('Send Us a Message', false);

        $submitResponse = $this->post('/contact', [
            'name' => 'Sokha',
            'contact_info' => '012345678',
            'topic' => 'Product Consultation',
            'message' => 'I would like advice on the Hair Ritual Pair.',
        ]);
        $submitResponse->assertRedirect(route('contact'));
        $submitResponse->assertSessionHas('contact_success');
    }
}
