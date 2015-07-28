<?php

namespace Illuminate\Foundation\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Salon;

trait RegistersUsers
{
    use RedirectsUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRegister()
    {
        return view('auth.register');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postRegister(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        Auth::login($this->create($request->all()));

        if($request['salon_owner']){
            $this->validate($request, [
                'name' => 'required|max:100',
                'city' => 'required|max:100',
                'address' => 'required|max:255',
            ]);
            $salon = new Salon();
            $salon->name = $request['name'];
            $salon->user_id = Auth::user()->id;
            $salon->address = $request['address'];
            $salon->city = $request['city'];
            $salon->main_photo = config('images.anonym');
            $salon->save();
            $salon_id = Salon::where('user_id', Auth::user()->id)->first()->id;
            session(['confirmed' => true]);
            return redirect('salon/'.$salon_id.'/edit');
        }
        return redirect($this->redirectPath());
    }
}
