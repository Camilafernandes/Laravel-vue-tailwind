<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function edit(Request $request, $id)
    {

        if ($id == '1') {
            $teste = '{
                "id": 123,
                  "name": "Enzo dos Santos",
                  "birthday": "31/12/1991",
                  "driver_license": {
                    "id": 24,
                    "number": "642123",
                    "issued_at": "31/12/2017"
                  },
                  "state": "RN",
                  "city": "Natal",
                  "phones": [{
                    "id": 37,
                    "code": "99",
                    "number": "99999-9999"
                  }]
              }';
                
        }else if ($id == 2) {
            $teste = '{
                "id": 124,
                "name": "Segundo Silva",
                "birthday": "31/12/2013",
                "state": "CE",
                "phones": [{
                  "id": 44,
                  "code": "77",
                  "number": "77777-7777"
                }],
                "emails": [{
                  "id": 64,
                  "address": "segundosilva@noffffula.io"
                }, {
                  "id": 65,
                  "address": "segundo@fulaaaaa.no"
                }],
                "parent": {
                  "id": 74,
                  "name": "Paizão do Segundo",
                  "phone": {
                    "id": 77,
                    "code": "66",
                    "number": "66666-6666"
                  }
                }
              }';
        }

        $user = json_decode($teste);
        return view('edit', compact('user', 'phones'));        
    }

}
