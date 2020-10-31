<?php

namespace Tests\Unit;

use Tests\TestCase;

class BitcoinPriceTest extends TestCase
{

    /**
     * Test if start date is Empty.
     *
     * @return void
     */
    
    public function test_start_date_is_empty()
    {
        // show  actiual errors without handling
        //$this->withoutExceptionHandling();
        
        $this->post('/', array_merge($this->data(),['start_date'=>'']))
            ->assertSessionHasErrors('start_date');
        
    }
    
    /**
     * Test if end date is Empty.
     *
     * @return void
     */
    public function test_end_date_is_empty()
    {
        // show  actiual errors without handling
        //$this->withoutExceptionHandling();
        
        $this->post('/', array_merge($this->data(),['end_date'=>'']))
            ->assertSessionHasErrors('end_date');
        
    }

    /**
     * Test Start date Format Y-m-d.
     *
     * @return void
     */
    public function test_start_date_format_type()
    {
        // show  actiual errors without handling
        //$this->withoutExceptionHandling();
        
        $this->post('/', array_merge($this->data(),['start_date'=>'abc']))
            ->assertSessionHasErrors('start_date');
    }

    /**
     * Test End date Format Y-m-d.
     *
     * @return void
     */
    public function test_end_date_format_type()
    {
        // show  actiual errors without handling
        ////$this->withoutExceptionHandling();
        
        $this->post('/', array_merge($this->data(),['end_date'=>'abc']))
            ->assertSessionHasErrors('end_date');
    }
    
    /**
     * test if start date is before 30 days from now.
     *
     * @return void
     */
    
    public function test_start_date_before_more_than_30_days()
    {
        // show  actiual errors without handling
        //$this->withoutExceptionHandling();
        
        $this->post('/', array_merge($this->data(),['start_date'=>date('Y-m-d', strtotime('-35 days'))]))
            ->assertSessionHasErrors('start_date');
        
    }
    
    /**
     * Test if end date is before more than 30 days from now.
     *
     * @return void
     */
    
    public function test_end_date_before_more_than_30_days()
    {
        // show  actiual errors without handling
        //$this->withoutExceptionHandling();
        
        $this->post('/', array_merge($this->data(),['end_date'=>date('Y-m-d', strtotime('-35 days'))]))
            ->assertSessionHasErrors('end_date');
        
    }

    /**
     * test if end date is before start date.
     *
     * @return void
     */
    
    public function test_end_date_is_before_start_date()
    {
        // show  actiual errors without handling
        //$this->withoutExceptionHandling();
        
        $this->post('/', array_merge($this->data(),['start_date'=>date('Y-m-d'),'end_date'=>date('Y-m-d', strtotime('-35 days'))]))
            ->assertSessionHasErrors('start_date');
        
    }
    
    /**
     * test if start date is after end date.
     *
     * @return void
     */
    
    public function test_start_date_is_after_end_date()
    {
        // show  actiual errors without handling
        //$this->withoutExceptionHandling();
        
        
        $this->post('/', array_merge($this->data(),['start_date'=>date('Y-m-d', strtotime('+35 days')),'end_date'=>date('Y-m-d')]))
            ->assertSessionHasErrors('end_date');
        
    }
    
    /**
    * Data provided for test methods below
    *
    * @return Array
    */
    
    private function data()
    {
        return [
            '_token' => csrf_token(),
            'start_date'=>date('Y-m-d', strtotime('-7 days')),
            'end_date'=>date('Y-m-d')
        ];
    }
}
