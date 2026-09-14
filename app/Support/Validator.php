<?php

class Validator
{
    private array $errors = [];

    public function required(string $value, string $label): self
    {
        if (trim($value) === '') {
            $this->errors[] = "{$label}を入力してください";
        }

        return $this;
    }

    public function maxLength(string $value, int $max, string $label): self
    {
        if (mb_strlen($value) > $max) {
            $this->errors[] = "{$label}は{$max}文字以内で入力してください";
        }

        return $this;
    }

    public function addError(string $message): self
    {
        $this->errors[] = $message;

        return $this;
    }

    public function fails(): bool
    {
        return !empty($this->errors);
    }

    public function errors(): array
    {
        return $this->errors;
    }
}
