<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateHouseholdRequest extends FormRequest
{
    protected array $types = ['IPDS', 'Produksi'];
    protected array $categories = ['Seruti', 'Susenas'];

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
            'before' => ['required', 'integer', 'min:1'],
            'after' => ['required', 'integer', 'min:1'],
            'household' => ['required', 'integer', 'min:1'],
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
            'before' => __('pcl.before.label'),
            'after' => __('pcl.after.label'),
            'household' => __('pcl.household.label'),
        ];
    }
}
