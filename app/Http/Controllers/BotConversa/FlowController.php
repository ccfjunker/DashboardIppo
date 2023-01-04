<?php

namespace App\Http\Controllers\BotConversa;

use App\Http\Controllers\Controller;
use App\Http\Requests\FlowRequest;
use GuzzleHttp\Client;

class FlowController extends Controller
{

    /**
     * send_flow
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function send_flow(FlowRequest $request)
    {

        $validated = $request->validated();
        if ($validated) {
            try {
                // Bootstrap
                $key = env('BOT_CONVERSA_KEY');
                $url = "https://backend.botconversa.com.br/api/v1/webhook/";
                $headers = ['API-KEY' => $key];
                $client = new Client();

                // Select Flow
                $request_flows = $client->createRequest('GET', $url . 'flows/', [
                    'headers' => $headers
                ]);
                $response_flows = $client->send($request_flows);
                $result_flows = $response_flows->getBody();
                $flows_array = json_decode($result_flows, true);
                $id_flow = "";
                foreach ($flows_array as $flow) {
                    if ($flow["name"] === $request["nome_flow"]) {
                        $id_flow = $flow["id"];
                    }
                }
                if ($id_flow === "") {
                    foreach ($flows_array as $flow) {
                        if ($flow["id"] === $request["id_flow"]) {
                            $id_flow = $flow["id"];
                        }
                    }
                }

                // Select Users
                $request_users = $client->createRequest('GET', $url . 'subscribers/', [
                    'headers' => $headers
                ]);
                $response_users = $client->send($request_users);
                $result_users = $response_users->getBody();
                $users_array = json_decode($result_users, true);
                foreach ($users_array["results"] as $user) {
                    if ($request["all_users"]) {
                        $client->post($url . 'subscriber/' . $user["id"] . '/send_flow' . '/', [
                            'headers' => $headers,
                            'json' => [
                                "flow" => $id_flow
                            ]
                        ]);
                    } else if ($user["variables"]["ID_EMPRESA"] == $request["id_empresa"]) {
                        $client->post($url . 'subscriber/' . $user["id"] . '/send_flow' . '/', [
                            'headers' => $headers,
                            'json' => [
                                "flow" => $id_flow
                            ]
                        ]);
                    }
                }

                return response()->json([
                    'message' => "sucesss"
                ], 200);
            } catch (\Exception $exception) {
                return response()->json([
                    'message' => 'Error on send Flow!',
                    'error' => $exception->getMessage()
                ], 500);
            }
        }
    }
}
