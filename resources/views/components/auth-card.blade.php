<div class="container mt-5  d-flex justify-content-center align-items-center">
    <div class="col-md-6 col-sm-8">
        <div class="card p-5 de-flex flex-column ">

            <div class="row mt-5 justify-content-center">
                <div class="col-md-10 col-12">
                             
                    {{ $slot ?? null }}

                    @if (isset($divider))
                       
                        <div class="d-flex align-items-center my-4">
                            <hr class="flex-grow-1">
                                {{ $divider ?? null }}
                            <hr class="flex-grow-1">
                                
                        </div>
                            
                    @endif
  
                    <div class="mt-4 text-center">
                        {{ $authButton ?? null }}
                    </div>
                             
                </div>
                    
            </div>
                <p class="text-center mt-auto ">
                    {{ $footer  ?? null }}
                </p>

        </div>
    </div>
        
</div>

