<?php

    namespace App\Http\Controllers;


    use App\Http\Requests\PurchaseRequest;
    use App\Models\Purchase;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\DB;

    class PurchaseController extends ApiController {

        /**
         * @throws \Exception
         */
        public function purchase(PurchaseRequest $request) {
            if($request['type'] == 1)
                $status = Purchase::PURCHASE;
            else
                $status = Purchase::RENT;



            DB::beginTransaction();

            try {
                $purchase = Purchase::create([
                    'user_id'=>Auth::id(),
                    'book_id'=>$request['book_id'],
                    'status'=>$status
                ]);
            } catch (\Exception $e) {
                DB::rollBack();

                throw new \Exception($e->getMessage());
            }



            DB::commit();

            return $this->respondCreated($purchase);
        }
        public function get()
        {
            $purchases = Purchase::all();
            return $this->respondSuccess($purchases);
        }
    }
