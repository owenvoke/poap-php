<?php

declare(strict_types=1);

namespace OwenVoke\POAP\Api;

use Http\Message\MultipartStream\MultipartStreamBuilder;

class Event extends AbstractApi
{
    public function all(array $parameters = []): array
    {
        return $this->get('/events', $parameters);
    }

    public function show(int $id): array
    {
        return $this->get("/events/id/{$id}");
    }

    public function showBySlug(string $slug): array
    {
        return $this->get("/events/{$slug}");
    }

    public function validate(int $id, string $secretCode): array
    {
        return $this->post('/events/validate', [
            'event_id' => $id,
            'secret_code' => $secretCode,
        ]);
    }

    public function create(
        string $name,
        string $image,
        string $description,
        string $secretCode,
        array $parameters
    ): array {
        $builder = new MultipartStreamBuilder($this->getClient()->getHttpClientBuilder()->streamFactory);

        $parameters = array_merge([
            'private_event' => false,
        ], $parameters);

        foreach ($parameters as $key => $value) {
            if (is_bool($value)) {
                $value = $value ? 'true' : 'false';
            }

            $builder->addResource($key, (string) $value);
        }

        $builder
            ->addResource('name', $name)
            ->addResource('description', $description)
            ->addResource('secret_code', $secretCode)
            ->addResource('image', fopen($image, 'rb'), ['filename' => 'image.png']);

        return $this->postRaw(
            '/events',
            $builder->build()->getContents(),
            ['Content-Type' => "multipart/form-data; boundary=\"{$builder->getBoundary()}\""]
        );
    }
}
