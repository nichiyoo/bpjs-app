<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProgressRequest extends FormRequest
{
    protected array $types = ['IPDS', 'Produksi'];
    protected array $categories = ['Seruti', 'Susenas'];
    protected array $answers = [
        'Terisi Lengkap',
        'Terisi Tidak Lengkap',
        'Tidak Ada ART/Responden Yang Dapat Memberi Jawaban',
        'Responden Menolak',
        'Responden Menolak (Tidak Ada ART)',
        'Rumah Tangga Pindah'
    ];

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
            'nks' => [
                'required',
                'string',
                'exists:officers,nks',
                Rule::when(!$this->user()->hasRole('admin'), Rule::in($this->user()->officer()->pluck('nks')->toArray()))
            ],
            'type' => ['required', 'string', Rule::in($this->types)],
            'category' => ['required', 'string', Rule::in($this->categories)],
            'sample' => ['required', 'integer', 'min:1'],
            'kor' => ['required', 'string', Rule::in($this->answers)],
            'kp' => ['required', 'string', Rule::in($this->answers)],
            'photo' => ['nullable', 'string'],
        ];
    }

    /**
     * Set the attributes naming for localization.
     */
    public function attributes(): array
    {
        return [
            'type' => __('pcl.type.label'),
            'category' => __('pcl.category.label'),
            'sample' => __('pcl.sample.label'),
            'kor' => __('pcl.kor.label'),
            'kp' => __('pcl.kp.label'),
            'photo' => __('pcl.photo.label'),
        ];
    }
}
