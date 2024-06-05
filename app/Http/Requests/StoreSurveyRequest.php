<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreSurveyRequest extends FormRequest
{
    protected array $durations = ['Bulanan', 'Tahunan'];
    protected array $statuses = ['Berjalan', 'Selesai'];
    protected array $types = ['IPDS', 'Produksi', 'Distribusi', 'Neraca', 'Sosial'];

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'start' => ['required', 'date'],
            'end' => ['required', 'date', 'after:start'],
            'annotation' => ['nullable', 'string', 'min:3', 'max:255'],
            'sample' => ['required', 'numeric', 'min:1'],
            'document' => ['required', 'numeric', 'min:1', 'max:' . $this->get('sample')],
            'entry' => ['required', 'numeric', 'min:1', 'max:' . $this->get('document')],
            'status' => ['required', 'string', Rule::in($this->statuses)],
            'type' => ['required', 'string', Rule::in($this->types)],
            'duration' => ['required', 'string', Rule::in($this->durations)],
        ];
    }

    /**
     * Set the attributes naming for localization.
     */
    public function attributes(): array
    {
        return [
            'name' => __('survey.name.label'),
            'start' => __('survey.start.label'),
            'end' => __('survey.end.label'),
            'sample' => __('survey.sample.label'),
            'document' => __('survey.document.label'),
            'entry' => __('survey.entry.label'),
            'status' => __('survey.status.label'),
            'type' => __('survey.type.label'),
            'duration' => __('survey.duration.label'),
        ];
    }
}
