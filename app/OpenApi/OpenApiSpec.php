<?php

namespace App\OpenAPI;

use OpenApi\Attributes as OA;

#[OA\Info(
    version: '1.0.0',
    title: 'Breeze Package CRUD API',
    description: 'API documentation for Breeze Package CRUD'
)]
#[OA\Server(
    url: 'http://127.0.0.1:8000',
    description: 'Local server'
)]
#[OA\SecurityScheme(
    securityScheme: 'sanctum',
    type: 'http',
    scheme: 'bearer',
    bearerFormat: 'Token'
)]
#[OA\Tag(
    name: 'Auth',
    description: 'Authentication APIs'
)]
class OpenApiSpec
{
    #[OA\Post(
        path: '/login',
        summary: 'Login user',
        tags: ['Auth'],
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                required: ['email', 'password'],
                properties: [
                    new OA\Property(property: 'email', type: 'string', example: 'ahmad@example.com'),
                    new OA\Property(property: 'password', type: 'string', example: 'password123'),
                ]
            )
        ),
        responses: [
            new OA\Response(response: 200, description: 'Login successful'),
            new OA\Response(response: 401, description: 'Invalid credentials'),
        ]
    )]
    public function loginDoc(): void
    {
    }

    #[OA\Post(
        path: '/register',
        summary: 'Register user',
        tags: ['Auth'],
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                required: ['name', 'email', 'password', 'password_confirmation'],
                properties: [
                    new OA\Property(property: 'name', type: 'string', example: 'Ahmad'),
                    new OA\Property(property: 'email', type: 'string', example: 'ahmad@example.com'),
                    new OA\Property(property: 'password', type: 'string', example: 'password123'),
                    new OA\Property(property: 'password_confirmation', type: 'string', example: 'password123'),
                ]
            )
        ),
        responses: [
            new OA\Response(response: 201, description: 'User registered successfully'),
            new OA\Response(response: 422, description: 'Validation error'),
        ]
    )]
    public function registerDoc(): void
    {
    }

    #[OA\Post(
        path: '/logout',
        summary: 'Logout user',
        tags: ['Auth'],
        security: [['sanctum' => []]],
        responses: [
            new OA\Response(response: 200, description: 'Logout successful'),
        ]
    )]
    public function logoutDoc(): void
    {
    }
}
