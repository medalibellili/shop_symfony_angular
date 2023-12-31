<?php

namespace Proxies\__CG__\App\Entity;


/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Depot extends \App\Entity\Depot implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Proxy\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Proxy\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array<string, null> properties to be lazy loaded, indexed by property name
     */
    public static $lazyPropertiesNames = array (
);

    /**
     * @var array<string, mixed> default values of properties to be lazy loaded, with keys being the property names
     *
     * @see \Doctrine\Common\Proxy\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array (
);



    public function __construct(?\Closure $initializer = null, ?\Closure $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return ['__isInitialized__', '' . "\0" . 'App\\Entity\\Depot' . "\0" . 'id', '' . "\0" . 'App\\Entity\\Depot' . "\0" . 'nomDepot', '' . "\0" . 'App\\Entity\\Depot' . "\0" . 'adresse', '' . "\0" . 'App\\Entity\\Depot' . "\0" . 'codePostal', '' . "\0" . 'App\\Entity\\Depot' . "\0" . 'tel', '' . "\0" . 'App\\Entity\\Depot' . "\0" . 'longitude', '' . "\0" . 'App\\Entity\\Depot' . "\0" . 'latitude', '' . "\0" . 'App\\Entity\\Depot' . "\0" . 'stocks', '' . "\0" . 'App\\Entity\\Depot' . "\0" . 'entreprise'];
        }

        return ['__isInitialized__', '' . "\0" . 'App\\Entity\\Depot' . "\0" . 'id', '' . "\0" . 'App\\Entity\\Depot' . "\0" . 'nomDepot', '' . "\0" . 'App\\Entity\\Depot' . "\0" . 'adresse', '' . "\0" . 'App\\Entity\\Depot' . "\0" . 'codePostal', '' . "\0" . 'App\\Entity\\Depot' . "\0" . 'tel', '' . "\0" . 'App\\Entity\\Depot' . "\0" . 'longitude', '' . "\0" . 'App\\Entity\\Depot' . "\0" . 'latitude', '' . "\0" . 'App\\Entity\\Depot' . "\0" . 'stocks', '' . "\0" . 'App\\Entity\\Depot' . "\0" . 'entreprise'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Depot $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy::$lazyPropertiesDefaults as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', []);
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load(): void
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', []);
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized(): bool
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized): void
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null): void
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer(): ?\Closure
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null): void
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner(): ?\Closure
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @deprecated no longer in use - generated code now relies on internal components rather than generated public API
     * @static
     */
    public function __getLazyProperties(): array
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getId(): ?int
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', []);

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function setId(int $id): \App\Entity\Depot
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setId', [$id]);

        return parent::setId($id);
    }

    /**
     * {@inheritDoc}
     */
    public function getNomDepot(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNomDepot', []);

        return parent::getNomDepot();
    }

    /**
     * {@inheritDoc}
     */
    public function setNomDepot(string $nomDepot): \App\Entity\Depot
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNomDepot', [$nomDepot]);

        return parent::setNomDepot($nomDepot);
    }

    /**
     * {@inheritDoc}
     */
    public function getAdresse(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAdresse', []);

        return parent::getAdresse();
    }

    /**
     * {@inheritDoc}
     */
    public function setAdresse(string $adresse): \App\Entity\Depot
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAdresse', [$adresse]);

        return parent::setAdresse($adresse);
    }

    /**
     * {@inheritDoc}
     */
    public function getCodePostal(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCodePostal', []);

        return parent::getCodePostal();
    }

    /**
     * {@inheritDoc}
     */
    public function setCodePostal(string $codePostal): \App\Entity\Depot
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCodePostal', [$codePostal]);

        return parent::setCodePostal($codePostal);
    }

    /**
     * {@inheritDoc}
     */
    public function getTel(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTel', []);

        return parent::getTel();
    }

    /**
     * {@inheritDoc}
     */
    public function setTel(string $tel): \App\Entity\Depot
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTel', [$tel]);

        return parent::setTel($tel);
    }

    /**
     * {@inheritDoc}
     */
    public function getLongitude(): ?float
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLongitude', []);

        return parent::getLongitude();
    }

    /**
     * {@inheritDoc}
     */
    public function setLongitude(float $longitude): \App\Entity\Depot
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLongitude', [$longitude]);

        return parent::setLongitude($longitude);
    }

    /**
     * {@inheritDoc}
     */
    public function getLatitude(): ?float
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLatitude', []);

        return parent::getLatitude();
    }

    /**
     * {@inheritDoc}
     */
    public function setLatitude(float $latitude): \App\Entity\Depot
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLatitude', [$latitude]);

        return parent::setLatitude($latitude);
    }

    /**
     * {@inheritDoc}
     */
    public function getStocks(): \Doctrine\Common\Collections\Collection
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStocks', []);

        return parent::getStocks();
    }

    /**
     * {@inheritDoc}
     */
    public function addStock(\App\Entity\Stock $stock): \App\Entity\Depot
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addStock', [$stock]);

        return parent::addStock($stock);
    }

    /**
     * {@inheritDoc}
     */
    public function removeStock(\App\Entity\Stock $stock): \App\Entity\Depot
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeStock', [$stock]);

        return parent::removeStock($stock);
    }

    /**
     * {@inheritDoc}
     */
    public function getEntreprise(): ?\App\Entity\Entreprise
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEntreprise', []);

        return parent::getEntreprise();
    }

    /**
     * {@inheritDoc}
     */
    public function setEntreprise(?\App\Entity\Entreprise $entreprise): \App\Entity\Depot
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEntreprise', [$entreprise]);

        return parent::setEntreprise($entreprise);
    }

}
