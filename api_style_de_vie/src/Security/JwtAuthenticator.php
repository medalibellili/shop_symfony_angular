<?php
namespace App\Security;
use Lexik\Bundle\JWTAuthenticationBundle\Security\Guard\JWTTokenAuthenticator;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Symfony\Component\Security\Core\User\UserInterface;

class JwtAuthenticator extends JWTTokenAuthenticator
{
    public function checkCredentials($credentials, UserInterface $user)
    {
        // Implement your custom authentication logic here
        // You can verify the credentials against the user entity or an external service

        // Example: Check if the user is enabled
        if (!$user->isEnable()) {
            throw new CustomUserMessageAuthenticationException('User account is disabled.');
        }

        // Example: Check if the user's password matches the provided credentials
        //$isValid = $user->getPassword() === $credentials['password'];

        return true;
    }
}