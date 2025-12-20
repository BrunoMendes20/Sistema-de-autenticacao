
    <div class="container mt-5  d-flex justify-content-center align-items-center">
        <div class="col-md-6 col-sm-8">
            <div class="card p-5">

                <div class="row mt-5 justify-content-center">
                    <div class="col-md-10 col-12">

                      {{ $slot }}
                       
                        <hr>
                        <p class="text-center">
                            {{ $footer }}
                        </p>

                        <div class="d-flex align-items-center my-4">
                            <hr class="flex-grow-1">
                            {{ $orText }}
                            <hr class="flex-grow-1">

                        </div>
                        
                        <div class="mt-4 text-center">
                          {{ $authButton}}
                        </div>

                    </div>

                </div>

            </div>
        </div>
        
    </div>

