<?php echo Form::open([ 'url' => route('web.orders.store', Hashids::encode($service->id)), 'id' => 'not_home_order' ]); ?>


    <input type="hidden" name="company_id" value="">
    <input type="hidden" name="company_name" value="">
    <input type="hidden" name="user_id" value="">
    <input type="hidden" name="individual_count" value="">
    <input type="hidden" name="date" value="">
    <input type="hidden" name="time" value="">
    <input type="hidden" name="total_price" value="">
    <input type="hidden" name="is_home" value="0">

<?php echo Form::close(); ?>




    
        
            
                
                    
                
            

            

                
                
                
                
                
                

                
                    
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                    
                

                
                    
                        
                    
                    
                        
                    
                
            
        
    

