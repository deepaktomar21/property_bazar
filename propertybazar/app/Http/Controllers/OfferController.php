<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;
use Illuminate\Support\Facades\Validator;



class OfferController extends Controller
{

    public function offerIndex(Request $request)
{
    // Get the search query
    $search = $request->input('search');

    // Query offers with search functionality
    $query = Offer::query();
    if ($search) {
        $query->where('id', $search)
              ->orWhere('building_name', 'LIKE', "%{$search}%")
              ->orWhere('location', 'LIKE', "%{$search}%");
    }

    // Paginate results
    $offers = $query->paginate(10); // Adjust the number as needed

    // Pass the offers and the search term to the view
    return view('admin.offer.list', [
        'offers' => $offers,
        'search' => $search,
    ]);
}



    //   public function export_user_pdf(){
    //     $companyees = Companyee::get();
    //     $pdf = PDF::loadView('admin.master.company.pdf.users',['companyees' => $companyees]);
    //     return $pdf->download('users.pdf');
    // }
    public function deleteAll(Request $request)
{
    // Validate the request to ensure 'ids' is an array and contains valid integers
    $request->validate([
        'ids' => 'required|array',
        'ids.*' => 'integer|exists:offers,id' // Ensure each ID exists in the 'offers' table
    ]);

    $ids = $request->ids;

    // Attempt to delete the offers
    try {
        Offer::whereIn('id', $ids)->delete();
        return response()->json(["success" => "Offers have been deleted"]);
    } catch (\Exception $e) {
        // Catch any exception and return an error response
        return response()->json(["error" => "An error occurred while deleting offers"], 500);
    }
}


    // public function deleteAll(Request $request){

    //     $ids = $request->ids;
    //     Offer::whereIn('id',$ids)->delete();


    //     return response()->json(["success"=> "Users have been deleted"]);

    //       }
      public function create(){
        // echo "Hello ", "World", "!";


        return view('admin.offer.create');
    }

    public function offerstore(Request $request){
       // dd(request()->all());


        $validator = Validator::make($request->all(),[

                'building_name' => 'required',
                'location' => 'required',
                'offers' => 'required',
                'price' => 'required',
                'description' => 'required',
                'images' => 'required',
                'contact_number' => 'required',

           ]);

            // Upload images
        $images = time() . '.' . $request->images->extension();
        $request->images->move(public_path('uploads'), $images);


        $offer = new Offer;
            $offer->building_name = $request->building_name;
            $offer->location = $request->location;
            $offer->offers = $request->offers;
            $offer->price = $request->price;
            $offer->description = $request->description;
            $offer->images = $images;
            $offer->contact_number = $request->contact_number;

            $offer->save();

//$request->Session()->flash('success','Company added succesfully');


              return redirect()->route('admin.offer.list');
           }






          public function offeredit($id){
            $offer = Offer::findOrFail($id);



            return view('admin.offer.edit',['offer' => $offer]);
          }

         public function offerupdate(Request $request, $id){
            // dd(request()->all());
            $validator = Validator::make($request->all(),[
                'building_name' => 'required',
                'location' => 'required',
                'offers' => 'required',
                'price' => 'required',
                'description' => 'required',
                'images' => 'required',
                'contact_number' => 'required',

               ]);

               $offer = Offer::findOrFail($id);

        if ($request->hasFile('images')) {
            // Upload new image
            $images = time() . '.' . $request->images->extension();
            $request->images->move(public_path('uploads'), $images);
            // Delete old image if exists
            if ($offer->images) {
                $oldImagePath = public_path('uploads') . '/' . $offer->images;
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            // Update product image
            $offer->images = $images;
        }




                $offer->building_name = $request->building_name;
                $offer->location = $request->location;
                $offer->offers = $request->offers;
                $offer->price = $request->price;
                $offer->description = $request->description;
                $offer->contact_number = $request->contact_number;

                $offer->save();

                $request->Session()->flash('success','User Updated succesfully!!');


                  return redirect()->route('admin.offer.list');
               }



         public function offerdestroy($id)
         {
         $offer = Offer::where('id', $id)->first();
         $offer->delete();
         return back();
         }
         public function offershow($id, Request $request){

            $offer = Offer::findOrFail($id);

            return view('admin.offer.show',['offer'=> $offer]);

              }






}
