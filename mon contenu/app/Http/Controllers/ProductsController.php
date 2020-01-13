<?php
namespace App\Http\Controllers;



use Illuminate\Support\Facades\Auth;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    public function index(){
        $products = \App\Product::orderBy('created_at')->get();
        $products = \App\Product::orderBy('created_at', 'DESC')->get();
        return view('products.index', compact('products'));
     }
     public function create(){
        $categories = \App\Category::pluck('name','id');
        $product= new \App\Product();
        return view('products.create',compact('product','categories'));
        }
        public function store(Request $request)
        {
        
                 $product = new \App\Product();
                  //On verfie si une image est envoyée
   if($request->has('image_produit')){
    //On enregistre l'image dans un dossier
    $image = $request->file('image_produit');
    //Nous allons definir le nom de notre image en combinant le nom du produit et un timestamp
    $image_name = Str::slug($request->input('name')).'_'.time();
    //Nous enregistrerons nos fichiers dans /uploads/images dans public
    $folder = '/uploads/images/';
    //Nous allons enregistrer le chemin complet de l'image dans la BD
    $product->image_produit = $folder.$image_name.'.'.$image->getClientOriginalExtension();
    //Maintenant nous pouvons enregistrer l'image dans le dossier en utilisant la methode uploadImage();
    $this->uploadImage($image, $folder, 'public', $image_name);
}

                $product->name = $request->input('name');
                $product->prix = $request->input('prix');
                $product->description_produit = $request->input('description_produit');
                #$product->image_produit = $request->input('image_produit');
                $product->quantite_produit = $request->input('quantite_produit');
                $product->category_id = $request->input('category_id');
                $product->save();
               return redirect('/');

    
}

public function edit($id)
        {
            $product = \App\Product::find($id);//on recupere le produit
            $categories = \App\Category::pluck('name','id');

            return view('products.edit', compact('product','categories'));
        }
public function update(Request $request, $id){
        $product = \App\Product::find($id);
        if($product){
            if($request->has('image_produit')){
                //On enregistre l'image dans une variable
                $image = $request->file('image_produit');
                if(file_exists(public_path().$product->images))//On verifie si le fichier existe
                    Storage::delete(asset($product->images));//On le supprime alors
                //Nous enregistrerons nos fichiers dans /uploads/images dans public
                $folder = '/uploads/images/';
                $image_name = Str::slug($request->input('name')).'_'.time();
                $product->image_produit = $folder.$image_name.'.'.$image->getClientOriginalExtension();
                //Maintenant nous pouvons enregistrer l'image dans le dossier en utilisant la méthode uploadImage();
                $this->uploadImage($image, $folder, 'public', $image_name);
            }
     
            $product->name = $request->input('name');
            $product->prix = $request->input('prix');
            $product->description_produit = $request->input('description_produit');
            $product->quantite_produit = $request->input('quantite_produit');
            $product->save();
        }
        return redirect('/products');
        $product->update([
            'name' => $request->input('name'),
            'prix' => $request->input('prix'),
            'description_produit' => $request->input('description_produit'),
            'image_produit' => $request->input('image_produit'),
            'quantite_produit' => $request->input('quantite_produit'),
            'category_id' => $request->input('category_id'),

        ]);
        return redirect()->back();

}

public function create1()
{    $product=new \App\Product();
    $categories = \App\Category::pluck('name','id');
   return view('create', compact('product','categories'));
}
public function uploadImage(UploadedFile $uploadedFile, $folder = null, $disk = 'public', $filename = null)
        {
             $name = !is_null($filename) ? $filename : str_random('25');
            $file = $uploadedFile->storeAs($folder, $name.'.'.$uploadedFile->getClientOriginalExtension(), $disk);
 
             return $file;
         }
 public function destroy($id)
{
   $product = \App\Product::find($id);
   if($product)
       $product->delete();
   return redirect()->route('products');
}
public function show($id){
    $product = \App\Product::find($id);
    return view("products.show", compact('product'));
 }
 



}
