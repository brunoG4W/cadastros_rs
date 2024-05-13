<x-filament-panels::page.simple>
  

        <div  class="container px-4 mx-auto">

            
                <x-filament-panels::form
                    id="form"
                    :wire:key="$this->getId() . '.forms.' . $this->getFormStatePath()"
                    wire:submit="create"
                >
                    {{ $this->form }}
            

                        <x-filament::button type="submit">
                            GRAVAR
                        </x-filament::button>
            
            
            
                </x-filament-panels::form>
            
            </div>

</x-filament-panels::page.simple>



