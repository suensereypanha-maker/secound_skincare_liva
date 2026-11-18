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
    }

    public function test_home_page_footer_has_khqr_support_and_floating_social(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Support KH QR', false);
        $response->assertSee('/img/payments/bakong-khqr-icon.png', false);
        $response->assertSee('t.me/livaskincare', false);
        $response->assertSee('facebook.com/livaskincare', false);
    }
}

