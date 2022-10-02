<div  style="margin-left:200px; width:800px;float:left;">
    @if ($errors->any())
    <div class="alert alert-danger " style="margin-top: 35px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
<div>
<div style="margin-left:200px;margin-top: 30p" >
    @if(!empty($successMsg))
    <div class="alert alert-success">
        {{ $successMsg }}
    </div>
    @endif
    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="multi-wizard-step">
                <a href="#step-1" type="button"
                    class="btn {{ $currentStep != 1 ? 'btn-default' : 'btn-primary' }}">1</a>
                <p>Step 1</p>
            </div>
            <div class="multi-wizard-step">
                <a href="#step-2" type="button"
                    class="btn {{ $currentStep != 2 ? 'btn-default' : 'btn-primary' }}">2</a>
                <p>Step 2</p>
            </div>
            <div class="multi-wizard-step">
                <a href="#step-3" type="button"
                    class="btn {{ $currentStep != 3 ? 'btn-default' : 'btn-primary' }}"
                    disabled="disabled">3</a>
                <p>Step 3</p>
                </div>
            <div class="multi-wizard-step">
                <a href="#step-4" type="button"
                    class="btn {{ $currentStep != 4 ? 'btn-default' : 'btn-primary' }}"
                    disabled="disabled">4</a>
                <p>Step 4</p>
                </div>
            <div class="multi-wizard-step">
                <a href="#step-5" type="button"
                    class="btn {{ $currentStep != 5 ? 'btn-default' : 'btn-primary' }}"
                    disabled="disabled">4</a>
                <p>Step 4</p>
                </div>
            
    </div>
</div></div></div>
{{-- Tot ce e deasupra trebuie sa nu fie cuprins in extends ca sa mearga --}}
@extends('admin.admin_master')


@section('admin')

<div >
<div >

{{-- Step 1 - basic --}}
    <div class="row setup-content {{ $currentStep != 1 ? 'display-none' : '' }}" id="step-1">
        <div class="col-md-12">
            <h3 class="title-info-product">About product</h3>

                
            {{-- Image 1 --}}
            <div class="form-group" > 
                <label>Image 1</label> 
                <input type="text" wire:model='product_image_1' >
            </div>
            
            {{-- Image 2 --}}
            <div class="form-group" > 
                <label>Image 2</label> 
                <input type="text" wire:model='product_image_2' >
            </div>
            
            {{-- Image 3 --}}
            <div class="form-group" > 
                <label>Image 3</label> 
                <input type="text" wire:model='product_image_3' >
            </div>
            

             {{-- Image 4 --}}
            <div class="form-group" > 
                <label>Image 4</label> 
                <input type="text" wire:model='product_image_4'  >
            </div>
            
        
            {{-- language --}}
            <div>
                <label>Language</label> 
                <div>
                    <label><input type ="radio" wire:model = "product_language" value ='Ro'/> Romanian</label>
                     <label><input type ="radio" wire:model = "product_language" value ='En'/>English</label>
                </div>
            </div>
            

            {{--Product name --}}
                <div>
                    <label>Product name</label>
                    <input type="text" wire:model="product_name"   style="background-color: white;" >
                </div>
                

            {{-- Type of jewllery --}}
                <div class="form-group">
                    <label >Category</label>
                        <select  class="form-control"   wire:model="product_category">
                        <option value="">Choose an option</option>    
                        <option value="Rings">Ring</option>
                        <option value="Earrings">Earrings</option>
                        <option value="Necklaces">Necklace</option>
                        <option value="Bracelets"> Bracelet</option>
                        <option value="Tiaras"> Tiara</option>
                        <option value="Sets">Set</option>
                        <option value="Bookmarks">Bookmark</option>
                        </select>
                </div>
                

            {{-- Collection --}}
                <div class="form-group">
                    <label >Collection</label>
                        <select class="form-control" wire:model="product_collection">
                        <option value = "">None</option>
                        <option value = "Tarot">Tarot</option>
                        <option value = "Folklore">Folklore</option>
                        <option value = "Mystic"> Mystic</option>
                        </select>
                </div>
                

            {{-- Set --}}
                <label>Add to a set</label>
                <div class="form-group" >
                        <input type="text" wire:model='product_set_name' value = "">
                </div>

            {{-- product variation --}}
                <label>Product variation</label>
                <div class="form-group" >
                        <input type="text" wire:model='product_variation' value = "">
                </div>
                

            {{-- Gender recomandation --}}
                <div>
                    <label>Recomandate for:</label> 
                    <div>
                    <label><input type ="radio" wire:model = "gender_recommendation" value ='F'/> Women</label>
                    <label><input type ="radio" wire:model = "gender_recommendation" value ='M'/> Men</label>
                    <label><input type ="radio" wire:model = "gender_recommendation" value ='N'/> Unisex</label>
                        </div>
                    </div>
                    

        
            <div>
                <label>Description</label>
                <textarea wire:model="product_description" class="form-control"  rows="3"></textarea>
            </div>

                <div class="form-group">
                    <label >Price</label>
                    <input type="text" wire:model="product_price"  value=""/>
                </div>
                
                    
                {{-- Product cost --}}
                    <div>
                            <label>Product cost</label>
                            <input  type ="text" wire:model = "product_cost" value =""/>
                    </div>
                    
                </div>
            <button class="btn btn-primary nextBtn btn-lg pull-right" wire:click="firstStepSubmit" type="button">Next</button>
        </div>
    </div>

{{-- Main stone  --}}
    <div class="row setup-content {{ $currentStep != 2 ? 'display-none' : '' }}" id="step-2">
        <div class="col-md-12">
            <h3 class="title-info-product">Main stone</h3>
            <div class="form-group">


            {-- Stone name --}}
                    <div>
                            <label>Stone </label>
                            <select wire:model = "main_stone_type" >
                            <option value="">Choose a option</option>
                            <option value="Diamond">Diamond</option>
                            <option value="Swarovski">Swarovski</option>
                            <option value="Garnet">Garnet</option>
                            <option value="Amethyst">Amethyst</option>
                            <option value="Jasper">Jasper</option>
                            <option value="Sapphire">Sapphire</option>
                            <option value="Agate">Agate</option>
                            <option value="Ruby">Ruby</option>   
                            <option value="Topaz">Topaz</option>
                            <option value="Peridot">Peridot</option>
                        </select>
                    </div>
            
                {{-- Stone color --}}
                    <div>
                        <label>Stone color</label>
                            <select wire:model = "main_stone_color">
                                <option value="">Choose a option</option>
                                <option value="D">D - absoluty colorless</option>
                                <option value="E">E - colorless</option>
                                <option value="F">F - colorless</option>
                                <option value="G">G - almost colorless</option>
                                <option value="J">J - almost colorless</option>
                                <option value="K">K - easily color</option>   
                                <option value="M">M - easily color</option>
                                <option value="N">N - color</option>
                                <option value="R">R - color</option>
                                <option value="S">S - almost yellow</option>
                                <option value="Z">Z - almost yellow</option>
                                <option value="red">red</option>
                                <option value="orange">orange</option>
                                <option value="pink">pink</option>
                                <option value="blue">blue</option>
                                <option value="white">white</option>
                                <option value="black">black</option>   
                                <option value="green">green</option>
                                <option value="gray">gray</option>  
                            </select>
                    </div>

            {{--Stone carat --}}
                <div>
                    <label>Stone carat</label>
                    <input   type="text" wire:model = "main_stone_carat" value =""/>
                </div>

            {{-- Stone_mm --}}
                    <div>
                            <label>Mm carat</label>
                            <input  type ="text"  wire:model = "main_stone_mm" value =""/>
                    </div>

            {{-- Stone_mm --}}
                    <div>
                            <label>Gr</label>
                            <input  type ="text"  wire:model = "main_stone_gr" value =""/>
                    </div>

                {--Stone clariry --}}
                    <div>
                        <label>Stone_clarity</label>
                            <select wire:model = "main_stone_clarity">
                                <option value="none">None</option>
                                <option value="IF">IF</option>
                                <option value="FI">FI</option>
                                <option value="VVS1">VVS1</option>
                                <option value="VVS2">VVS2</option>
                                <option value="VS1">VS1</option>
                                <option value="VS2">VS2</option>   
                                <option value="SI1">SI1</option>
                                <option value="SI2">SI2</option>
                                <option value="I1">I1</option>
                                <option value="I2">I2</option>
                                <option value="I3">I3</option>  
                            </select>
                    </div>
                {{--Stone cut --}}
                    <div>
                        <label>Stone cut </label>
                            <select wire:model = "main_stone_cut">
                            <option value="">Choose a option</option>
                                <option value="excelent">Excelent</option>
                                <option value="very good">Very good</option>
                                <option value="fair">Fair</option>       
                            </select>
                    </div>


                {{--Stone_shape --}}
                    <div>
                            <label>Stone shape</label>
                            <select wire:model = "main_stone_shape" >
                                <option value="">Choose a option</option>
                                <option value="Princess">Princess</option>
                                <option value="Marquise">Marquise</option>
                                <option value="Round">round</option>
                                <option value="Cushion">cushion</option>
                                <option value="Pearl">pearl</option>
                                <option value="Nevette">nevette</option>   
                                <option value="Square">square</option>
                                <option value="Brilian">brilian</option>
                                <option value="Scrison">scrison</option>
                                <option value="Emerald">emerald</option>
                                <option value="Radiant">Radiant</option>
                                <option value="Oval">Oval</option>
                                <option value="Asscher">Asscher</option>
                            </select>
                    </div>

                </div>

                
            <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click= 'back({{1}})'>Back</button>
            
            <button class="btn btn-primary nextBtn btn-lg pull-right" type="button"
                wire:click="secondStepSubmitStone">Next</button>
        </div> </div>
    </div>

{{-- Second stone  --}}
    <div class="row setup-content {{ $currentStep != 3 ? 'display-none' : '' }}" id="step-3">
        <div class="col-md-12">
            <h3 class="title-info-product"> Second stone</h3>
            <div class="form-group add">


            {-- Stone name --}}
                    <div>
                            <label>Stone </label>
                            <select wire:model = "second_stone_type" >
                            <option value="">Choose a option</option>
                            <option value="diamond">diamond</option>
                            <option value="swarovski">swarovski</option>
                            <option value="garnet">garnet</option>
                            <option value="amethyst">amethyst</option>
                            <option value="jasper">jasper</option>
                            <option value="sapphire">sapphire</option>
                            <option value="agate">agate</option>
                            <option value="ruby">ruby</option>   
                            <option value="topaz">topaz</option>
                            <option value="Peridot">Peridot</option>
                        </select>
                    </div>
            
                {{-- Stone color --}}
                    <div>
                        <label>Stone color</label>
                            <select wire:model = "second_stone_color">
                                <option value="">Choose a option</option>
                                <option value="D">D - absoluty colorless</option>
                                <option value="E">E - colorless</option>
                                <option value="F">F - colorless</option>
                                <option value="G">G - almost colorless</option>
                                <option value="J">J - almost colorless</option>
                                <option value="K">K - easily color</option>   
                                <option value="M">M - easily color</option>
                                <option value="N">N - color</option>
                                <option value="R">R - color</option>
                                <option value="S">S - almost yellow</option>
                                <option value="Z">Z - almost yellow</option>
                                <option value="Red">Red</option>
                                <option value="Orange">Orange</option>
                                <option value="Pink">Pink</option>
                                <option value="Blue">Blue</option>
                                <option value="White">White</option>
                                <option value="Black">Black</option>   
                                <option value="Green">Green</option>
                                <option value="Gray">Gray</option>  
                            </select>
                    </div>

            {{--Stone carat --}}
                <div>
                    <label>Stone carat</label>
                    <input  type ="text" wire:model = "second_stone_carat"  value =""/>
                </div>

            {{-- Stone_mm --}}
                    <div>
                            <label>Mm carat</label>
                            <input  type ="text"  wire:model = "second_stone_mm" value =""/>
                    </div>

            {{-- Stone_mm --}}
                    <div>
                            <label>Gr</label>
                            <input  type ="text"  wire:model = "second_stone_gr" value =""/>
                    </div>

                {--Stone clariry --}}
                    <div>
                        <label>Stone_clarity</label>
                            <select wire:model = "second_stone_clarity">
                                <option value="None">None</option>
                                <option value="IF">IF</option>
                                <option value="FI">FI</option>
                                <option value="VVS1">VVS1</option>
                                <option value="VVS2">VVS2</option>
                                <option value="VS1">VS1</option>
                                <option value="VS2">VS2</option>   
                                <option value="SI1">SI1</option>
                                <option value="SI2">SI2</option>
                                <option value="I1">I1</option>
                                <option value="I2">I2</option>
                                <option value="I3">I3</option>  
                            </select>
                    </div>
                {{--Stone cut --}}
                    <div>
                        <label>Stone cut </label>
                            <select wire:model = "second_stone_cut">
                            <option value="">Choose a option</option>
                                <option value="Excelent">Excelent</option>
                                <option value="Very good">Very good</option>
                                <option value="Fair">Fair</option>       
                            </select>
                    </div>


                {{--Stone_shape --}}
                    <div>
                            <label>Stone shape</label>
                            <select wire:model = "second_stone_shape" >
                                <option value=" ">Choose a option</option>
                                <option value="Princess">Princess</option>
                                <option value="Marquise">Marquise</option>
                                <option value="Round">Round</option>
                                <option value="Cushion">Cushion</option>
                                <option value="Pearl">Pearl</option>
                                <option value="Nevette">Nevette</option>   
                                <option value="Square">Square</option>
                                <option value="Brilian">Brilian</option>
                                <option value="Scrison">Scrison</option>
                                <option value="Emerald">Emerald</option>
                                <option value="Radiant">Radiant</option>
                                <option value="Oval">Oval</option>
                                <option value="Asscher">Asscher</option>
                            </select>
                    </div>

                </div>

                
            <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click= 'back({{2}})'>Back</button>
            
            <button class="btn btn-primary nextBtn btn-lg pull-right" type="button"
                wire:click="thirdStepSubmitDiamond">Next</button>
        </div>
    </div>
    </div>
    

{{-- Metal info --}}
    <div class="row setup-content {{ $currentStep != 4 ? 'display-none' : '' }}" >
        <div class="col-md-12">
            <h3 class="title-info-product" >Metal</h3>
            
            {{-- Metal -select the material used to make the jewlery --}}
           <div>
            <label>Material</label>
            <select wire:model="metal_type">
                <option value="">Choose a option</option>
                <option value="Gold-24">Gold 24k</option>
                <option value="Gold-18">Gold 18k</option>
                <option value="Gold-14">Gold 14k</option>
                <option value="Silver-925">Argint 925</option>
                <option value="Platinum">Platinum</option>
                <option value="Steel">Stainless steel</option>
            </select>
        </div>

        {{-- Metal color --}}
        <div>
            <label>Metal  color</label> 
                <div>
                   <label> <input type ="radio" wire:model = "metal_color" value ='Gold'/> Gold</label>
                    <label><input type ="radio" wire:model = "metal_color" value ='White'/> White</label>
                </div>
        </div>

        {{-- Metal used for plating --}}
            <div>
            <label>Plated material</label>
            <select wire:model="metal_plating">
                <option value="">Choose a option</option>
                <option value="Gold-24">Gold 24k</option>
                <option value="Gold-18">Gold 18k</option>
                <option value="Gold-14">Gold 14k</option>
                <option value="Silver-925">Argint 925</option>
                <option value="Platinum">Platinum</option>
            </select>
        </div>

     {{-- Metal color --}}
        <div>
            <label>Metal plating color</label> 
                <div>
                    <label><input type ="radio" wire:model = "metal_plating_color" value ='Gold'/> Gold</label>
                    <label><input type ="radio" wire:model = "metal_plating_color" value ='White'/> White</label>
                </div>
        </div>

      {{-- Metal gr --}}
        <div>
                <label>Metal gr</label>
                <input  type ="text" wire:model = "metal_gr" value =""/>
        </div>

    
            <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back(3)">Back</button>
            <button class="btn btn-primary nextBtn btn-lg pull-right" type="button"
                wire:click="fourthStepSubmitDiamond">Next</button>
        </div>
    </div>


{{-- Final step --}}
    <div class="row setup-content {{ $currentStep != 5 ? 'display-none' : '' }}" id="step-3">
        <div class="col-md-12">
            <h3 class="title-info-product"> Check the infromation</h3>
            <table class="table">
                <tr>
                    <td> Name:</td>
                    <td><strong>{{$product_name}}</strong></td>
                </tr>
                <tr>
                    <td>Team Price:</td>
                    <td><strong>{{$main_stone_type}}</strong></td>
                </tr>
                <tr>
                    <td>Team status:</td>
                    <td><strong>{{$second_stone_type}}</strong></td>
                </tr>
               
            </table>
            <button class="btn btn-danger nextBtn btn-lg pull-right" type="button" wire:click="back(4)">Back</button>
            <button class="btn btn-success btn-lg pull-right" wire:click="submitForm" type="button">Finish!</button>
        </div>



</div>
@endsection

