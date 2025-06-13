<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Questionnaire;

class QuestionnaireController extends Controller
{
    public function index()
    {
        $questionnaires = Questionnaire::with('reservation')
            ->latest()
            ->paginate(10);

        return view('dashboard.questionnaire.index', compact('questionnaires'));
    }

    public function show(Questionnaire $id)
    {
        $questionnaire = $id->load('reservation');
        return view('dashboard.questionnaire.show', compact('questionnaire'));
    }

    public function destroy(Questionnaire $id)
    {
        $id->delete();
        return redirect()->route('dashboard.questionnaire.index')
            ->with('success', 'Kuesioner berhasil dihapus');
    }
}
