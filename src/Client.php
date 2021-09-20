<?php

declare(strict_types=1);

namespace OwenVoke\POAP;

use Http\Client\Common\HttpMethodsClientInterface;
use Http\Client\Common\Plugin\AddHostPlugin;
use Http\Client\Common\Plugin\HeaderDefaultsPlugin;
use Http\Client\Common\Plugin\RedirectPlugin;
use Http\Discovery\Psr17FactoryDiscovery;
use OwenVoke\POAP\Api\AbstractApi;
use OwenVoke\POAP\Api\Account;
use OwenVoke\POAP\Api\Delivery;
use OwenVoke\POAP\Api\Event;
use OwenVoke\POAP\Api\Token;
use OwenVoke\POAP\Exception\BadMethodCallException;
use OwenVoke\POAP\Exception\InvalidArgumentException;
use OwenVoke\POAP\HttpClient\Builder;
use OwenVoke\POAP\HttpClient\Plugin\Authentication;
use Psr\Http\Client\ClientInterface;

/**
 * @method Api\Account account()
 * @method Api\Account accounts()
 * @method Api\Delivery delivery()
 * @method Api\Delivery deliveries()
 * @method Api\Event event()
 * @method Api\Event events()
 * @method Api\Token token()
 * @method Api\Token tokens()
 */
final class Client
{
    public const AUTH_ACCESS_TOKEN = 'access_token_header';

    private Builder $httpClientBuilder;

    public function __construct(Builder $httpClientBuilder = null)
    {
        $this->httpClientBuilder = $builder = $httpClientBuilder ?? new Builder();

        $builder->addPlugin(new RedirectPlugin());
        $builder->addPlugin(new AddHostPlugin(Psr17FactoryDiscovery::findUriFactory()->createUri('https://api.poap.xyz')));
        $builder->addPlugin(new HeaderDefaultsPlugin([
            'User-Agent' => 'poap-php (https://github.com/owenvoke/poap-php)',
        ]));

        $builder->addHeaderValue('Accept', 'application/json');
    }

    public static function createWithHttpClient(ClientInterface $httpClient): self
    {
        $builder = new Builder($httpClient);

        return new self($builder);
    }

    /** @throws InvalidArgumentException */
    public function api(string $name): AbstractApi
    {
        switch ($name) {
            case 'account':
            case 'accounts':
                return new Account($this);

            case 'delivery':
            case 'deliveries':
                return new Delivery($this);

            case 'event':
            case 'events':
                return new Event($this);

            case 'token':
            case 'tokens':
                return new Token($this);

            default:
                throw new InvalidArgumentException(sprintf('Undefined api instance called: "%s"', $name));
        }
    }

    public function authenticate(string $tokenOrLogin, ?string $password = null, ?string $authMethod = null): void
    {
        if (null === $password && null === $authMethod) {
            throw new InvalidArgumentException('You need to specify authentication method!');
        }

        if (null === $authMethod && $password === self::AUTH_ACCESS_TOKEN) {
            $authMethod = $password;
            $password = null;
        }

        $this->getHttpClientBuilder()->removePlugin(Authentication::class);
        $this->getHttpClientBuilder()->addPlugin(new Authentication($tokenOrLogin, $password, $authMethod));
    }

    public function __call(string $name, array $args): AbstractApi
    {
        try {
            return $this->api($name);
        } catch (InvalidArgumentException $e) {
            throw new BadMethodCallException(sprintf('Undefined method called: "%s"', $name), $e->getCode(), $e);
        }
    }

    public function getHttpClient(): HttpMethodsClientInterface
    {
        return $this->getHttpClientBuilder()->getHttpClient();
    }

    protected function getHttpClientBuilder(): Builder
    {
        return $this->httpClientBuilder;
    }
}
