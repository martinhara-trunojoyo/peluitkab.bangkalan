<?php

namespace App\Models;

use CodeIgniter\Model;

class FormSubmissionModel extends Model
{
    protected $table = 'form_submissions';
    protected $primaryKey = 'id';
    protected $allowedFields = ['form_id', 'submission_data', 'created_at'];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';

    public function saveSubmission($formId, $data)
    {
        $submissionData = [
            'form_id' => $formId,
            'submission_data' => json_encode($data),
        ];

        return $this->insert($submissionData);
    }

    public function getSubmissions($formId)
    {
        return $this->where('form_id', $formId)->findAll();
    }
}