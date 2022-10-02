<?php
  
namespace App\Http\Livewire;

use App\Models\MainStone;
use Livewire\Component;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\SecondStone;
use App\Models\Metal;
use Illuminate\Support\Carbon;
use Livewire\WithFileUploads;

use function Ramsey\Uuid\v1;

class AddProduct extends Component
{
    public $currentStep = 1;
    use WithFileUploads;

    
    public $product_image_1a = '';
    public $product_image_2b;
    public $product_image_3c;
    public $product_image_4d;
    //product
    public $product_image_1;
    public $product_image_2;
    public $product_image_3;
    public $product_image_4;
    public $product_language;
    public $product_name;
    public $product_category;
    public $product_collection;
    public $product_set_name;
    public $product_variation;
    public $gender_recommendation;
    public $product_cost;
    public $product_price;
    public $product_description;


    //MainStone
    public $main_stone_type;
    public $main_stone_color;
    public $main_stone_carat;
    public $main_stone_mm;
    public $main_stone_gr;
    public $main_stone_clarity;
    public $main_stone_cut;
    public $main_stone_shape;
        
    //SecondStone
    public $second_stone_type;
    public $second_stone_color;
    public $second_stone_carat;
    public $second_stone_mm;
    public $second_stone_gr;
    public $second_stone_clarity;
    public $second_stone_cut;
    public $second_stone_shape;
    
    //Metal

    public $metal_type;
    public $metal_color;
    public $metal_plating;
    public $metal_plating_color;
    public $metal_gr;

    public $step = 1;
    public $successMsg = '';

    public $image_1;

  
    /**
     * Write code on Method
     */
    public function render()
    {
        return view('livewire.add-product');
    }
  
    /**
     * Write code on Method
     */
    public function firstStepSubmit()
    {
        
        $validatedData = $this->validate([
            'product_image_1' => 'required',
            'product_image_2' => 'required',
            'product_image_3' => 'required',
            'product_image_4' => 'required',
            'product_language' => 'required',
            'product_name'  => 'required|unique:products',
            'product_category'  => 'required',
            'product_description'  => 'required',
            'product_cost'  => 'required|numeric',
            'product_price' => 'required|numeric',
            
        ]);

      //  $product_image_1a = hexdec(uniqid());
       // $product_image_2b=hexdec(uniqid());
       // $product_image_3c=hexdec(uniqid());
       // $product_image_4d=hexdec(uniqid());

     //   $img_ext1 = strtolower($this->product_image_1->getClientOriginalExtension());
       // $img_ext2 = strtolower($this->product_image_2->getClientOriginalExtension());
       // $img_ext3 = strtolower($this->product_image_3->getClientOriginalExtension());
       // $img_ext4 = strtolower($this->product_image_4->getClientOriginalExtension());


    //    $last_img1 = $product_image_1a.'.'.$img_ext1;
     //   $last_img2 = $product_image_2b.'.'.$img_ext2;
     //   $last_img3 = $product_image_3c.'.'.$img_ext3;
     //   $last_img4 = $product_image_4d.'.'.$img_ext4;

        //$this->product_image_1->storeAs('public', $last_img1); // store in resourses
        //$this->product_image_2->storeAs('public', $last_img2);
       // $this->product_image_3->storeAs('public', $last_img3);
       // $this->product_image_4->storeAs('public', $last_img4);
       
      

       // $this->product_image_1 = $last_img1;
       // $this->product_image_2 = $last_img2;
       // $this->product_image_3 = $last_img3;
        //$this->product_image_4 = $last_img4;
        $this->currentStep = 2;   
    }
  
    /** Step 2 - main stone diamond */
    public function secondStepSubmitStone()
    {
        $validatedData = $this->validate([
            'main_stone_type' => 'required',
            'main_stone_color'  => 'required',
            'main_stone_shape' => 'required',
            
        ]);

      
            $this->currentStep = 3;
            
    }

    public function thirdStepSubmitDiamond()
    {
       

      
            $this->currentStep = 4;
            
    }

    public function fourthStepSubmitDiamond()
    {
        $validatedData = $this->validate([
            'metal_type' => 'required',
            'metal_color'  => 'required',
            
        ]);
      
            $this->currentStep = 5;
            
    }
  
  
    /**
     * Write code on Method
     */
    public function submitForm(Request $request )

    {
         

        Product::create([
            'product_image_1'=> $this->product_image_1,
            'product_image_2'=> $this->product_image_2,
            'product_image_3'=> $this->product_image_3,
            'product_image_4'=> $this->product_image_4,
            'product_language' => $this-> product_language,
            'product_name'  => $this->product_name,
            'product_category'  => $this->product_category,
            'product_collection'  => $this->product_collection,
            'product_set_name'  => $this->product_set_name,
            'product_variation' => $this->product_variation,
            'gender_recommendation'  => $this->gender_recommendation,
            'product_description'  => $this-> product_description,
            'product_cost'  =>$this->product_cost,
            'product_price' => $this-> product_price,
            'created_at' => Carbon::now()
        ]);

        MainStone::create([
            'product_name'  => $this->product_name,
            'main_stone_type' => $this->main_stone_type,
            'main_stone_color'  => $this-> main_stone_color,
            'main_stone_carat'  => $this-> main_stone_carat,
            'main_stone_mm'  =>  $this->main_stone_mm,
            'main_stone_gr'  =>  $this->main_stone_gr,
            'main_stone_clarity'  => $this->main_stone_clarity,
            'main_stone_cut'  =>  $this->main_stone_cut,
            'main_stone_shape' => $this-> main_stone_shape,
            'created_at' => Carbon::now()
        ]);

        SecondStone::create([
            'product_name'  => $this->product_name,
            'second_stone_type' => $this-> second_stone_type,
            'second_stone_color'  => $this-> second_stone_color,
            'second_stone_carat'  =>  $this->second_stone_carat,
            'second_stone_mm'  =>  $this->second_stone_mm,
            'second_stone_gr'  =>  $this->second_stone_gr,
            'second_stone_clarity'  => $this-> second_stone_clarity,
            'second_stone_cut'  =>  $this->second_stone_cut,
            'second_stone_shape' =>  $this->second_stone_shape,
            'created_at' => Carbon::now(),
        ]);
  
        Metal::create([
            'product_name'  => $this->product_name,
            'metal_type' =>  $this->metal_type,
            'metal_color'  => $this-> metal_color,
            'metal_plating'  =>  $this->metal_plating,
            'metal_plating_color'  => $this-> metal_plating_color,
            'metal_gr'  =>  $this->metal_gr,
            'created_at' => Carbon::now(),
        ]);

        $this->successMsg = 'Product added';
  
        $this->clearForm();
        
        $this->currentStep = 1;
    }
  
    /**
     * Write code on Method
     */
    public function back($step)
    {
        $this->currentStep = $step;    
    }
  
    /**
     * Write code on Method
     */
    public function clearForm()
    {
        $this->product_image_1 = '';
        $this->product_image_2 = '';
        $this->product_image_3 = '';
        $this->product_image_4 = '';
        $this->name = '';
        $this->price = '';
        $this->detail = '';
        $this->status = 1;
    $this->product_language = '';
    $this->product_name = '';
    $this->product_category = '';
    $this->product_collection = '';
    $this->product_set_name = '';
    $this->gender_recommendation = '';
    $this->product_cost = '';
    $this->product_price = '';
    $this->product_description = '';


    //MainStone
    $this->main_stone_type = '';
    $this->main_stone_color = '';
    $this->main_stone_carat = '';
    $this->main_stone_mm = '';
    $this->main_stone_gr = '';
    $this->main_stone_clarity = '';
    $this->main_stone_cut = '';
    $this->main_stone_shape = '';
        
    //SecondStone
    $this->second_stone_type = '';
    $this->second_stone_color = '';
    $this->second_stone_carat = '';
    $this->second_stone_mm = '';
    $this->second_stone_gr = '';
    $this->second_stone_clarity = '';
    $this->second_stone_cut = '';
    $this->second_stone_shape = '';
    
    //Metal

    $this->metal_type = '';
    $this->metal_color = '';
    $this->metal_plating = '';
    $this->metal_plating_color = '';
    $this->metal_gr = '';

    }
}