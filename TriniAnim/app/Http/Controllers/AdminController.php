<?php

namespace App\Http\Controllers;

use App\Models\Emocion;
use App\Models\Evento;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //

    public function indexAdmin()
    {
        // Emociones
        $emociones = Emocion::all();
        $arrayEmociones = array();
        foreach ($emociones as $emocion) {
            array_push($arrayEmociones, $emocion->emocion); // emoción es el nombre de la emoción
        }
        $arrayEmocionesJs = json_encode($arrayEmociones);

        // // Eventos
        // $eventos = Evento::all();
        // $contEnfadado = 0;
        // $contTriste = 0;
        // $contNormal = 0;
        // $contContento = 0;
        // $contEuforico = 0;
        // foreach ($eventos as $evento) {
        //     switch ($evento->emocion_id) {
        //         case 1:
        //             $contEnfadado++;
        //             break;
        //         case 2:
        //             $contTriste++;
        //             break;
        //         case 3:
        //             $contNormal++;
        //             break;
        //         case 4:
        //             $contContento++;
        //             break;
        //         case 5:
        //             $contEuforico++;
        //             break;
        //         default:
        //             # code...
        //             break;
        //     }
        // }
        // $arrayEventosValues = array($contEnfadado, $contTriste, $contNormal, $contContento, $contEuforico);
        // $arrayEventosValuesJs = json_encode($arrayEventosValues);

        // Otra forma

        // $arrayMedias = array();
        // foreach ($usuarios as $usuario) {
        //     $sumatorio = 0;
        //     $eventosUsuario = Evento::where('usuario_id', $usuario->id)->get();
        //     $media = 0;
        //     $divisor = sizeof($eventosUsuario);
        //     if ($divisor > 0) { // Si tiene algun evento
        //         foreach ($eventosUsuario as $evento) {
        //             $sumatorio += $evento->emocion_id;
        //         }
        //         $media = round($sumatorio / $divisor);
        //     } else { // Si NO tiene ningun evento
        //         $media = 0;
        //     }
        //     array_push($arrayMedias, $media);
        // }
        // $arrayMediasJS = json_encode($arrayMedias);
        // return $arrayMediasJS;


        // Usuarios
        $usuarios = User::whereNotIn('userName', ['admin'])->get();
        // Medias
        $arrayMedias = array();
        $contEnfadado = 0;
        $contTriste = 0;
        $contNormal = 0;
        $contContento = 0;
        $contEuforico = 0;
        foreach ($usuarios as $usuario) {
            $sumatorio = 0;
            $eventosUsuario = Evento::where('usuario_id', $usuario->id)->get();
            $media = 0;
            $divisor = sizeof($eventosUsuario);
            if ($divisor > 0) { // Si tiene algun evento
                foreach ($eventosUsuario as $evento) {
                    $sumatorio += $evento->emocion_id;
                }
                $media = round($sumatorio / $divisor);
                switch ($media) {
                    case 1:
                        $contEnfadado++;
                        break;
                    case 2:
                        $contTriste++;
                        break;
                    case 3:
                        $contNormal++;
                        break;
                    case 4:
                        $contContento++;
                        break;
                    case 5:
                        $contEuforico++;
                        break;
                    default:
                        # code...
                        break;
                }
            }
        }

        $arrayMedias = array($contEnfadado, $contTriste, $contNormal, $contContento, $contEuforico);
        $arrayMediasJs = json_encode($arrayMedias);
        return view('trini.admin', [
            'usuarios' => $usuarios,
            'emociones' => $arrayEmocionesJs,
            // 'eventos' => $arrayEventosValuesJs
            'medias' => $arrayMediasJs
        ]);
        // $usuarios=User::all();
        // return view('trini.admin', ['usuarios' => $usuarios]);
    }

    public function getMediaAdmin(string $id)
    {
        $emocion = null;
        $sumatorio = 0;
        $usuario = User::find($id);
        $eventos = Evento::where('usuario_id', $usuario->id)->get();
        foreach ($eventos as $evento) {
            $sumatorio += $evento->emocion_id;
        }
        $divisor = sizeof($eventos);
        if ($divisor > 0) { // Si tiene algun evento
            $media = round($sumatorio / $divisor);
            $emocionResumen = Emocion::find($media);
            $nombreArray = explode("b", $emocionResumen->imagen);
            $imagenN = $nombreArray[0] . $nombreArray[1];
            $emocion = $emocionResumen->emocion;
        } else { // Si NO tiene ningun evento
            $media = 3; // La neutra
            $emocionResumen = Emocion::find($media);
            $imagenN = $emocionResumen->imagen;
        }

        return view('trini.media-diaria', [
            'imagen' => $imagenN,
            'emocion' => $emocion
        ]);
    }
}
