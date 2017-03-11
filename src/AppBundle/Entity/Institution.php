<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Institution
 */
class Institution
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $codSiiir;

    /**
     * @var string
     */
    private $codSirues;

    /**
     * @var string
     */
    private $denumireScurta;

    /**
     * @var string
     */
    private $denumire;

    /**
     * @var string
     */
    private $localitate;

    /**
     * @var string
     */
    private $localitateSuperioara;

    /**
     * @var string
     */
    private $strada;

    /**
     * @var string
     */
    private $numar;

    /**
     * @var string
     */
    private $codPostal;

    /**
     * @var string
     */
    private $statut;

    /**
     * @var string
     */
    private $tipUnitate;

    /**
     * @var string
     */
    private $unitatePj;

    /**
     * @var string
     */
    private $modFunctionare;

    /**
     * @var string
     */
    private $formaFinantare;

    /**
     * @var string
     */
    private $formaProprietate;

    /**
     * @var string
     */
    private $codFiscal;

    /**
     * @var string
     */
    private $judet;

    /**
     * @var string
     */
    private $dataModificarii;

    /**
     * @var string
     */
    private $dataAcreditarii;

    /**
     * @var string
     */
    private $dataIntrariiInVigoare;

    /**
     * @var string
     */
    private $dataInchiderii;

    /**
     * @var string
     */
    private $telefon;

    /**
     * @var string
     */
    private $fax;

    /**
     * @var string
     */
    private $email;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set codSiiir
     *
     * @param string $codSiiir
     *
     * @return Institution
     */
    public function setCodSiiir($codSiiir)
    {
        $this->codSiiir = $codSiiir;

        return $this;
    }

    /**
     * Get codSiiir
     *
     * @return string
     */
    public function getCodSiiir()
    {
        return $this->codSiiir;
    }

    /**
     * Set codSirues
     *
     * @param string $codSirues
     *
     * @return Institution
     */
    public function setCodSirues($codSirues)
    {
        $this->codSirues = $codSirues;

        return $this;
    }

    /**
     * Get codSirues
     *
     * @return string
     */
    public function getCodSirues()
    {
        return $this->codSirues;
    }

    /**
     * Set denumireScurta
     *
     * @param string $denumireScurta
     *
     * @return Institution
     */
    public function setDenumireScurta($denumireScurta)
    {
        $this->denumireScurta = $denumireScurta;

        return $this;
    }

    /**
     * Get denumireScurta
     *
     * @return string
     */
    public function getDenumireScurta()
    {
        return $this->denumireScurta;
    }

    /**
     * Set denumire
     *
     * @param string $denumire
     *
     * @return Institution
     */
    public function setDenumire($denumire)
    {
        $this->denumire = $denumire;

        return $this;
    }

    /**
     * Get denumire
     *
     * @return string
     */
    public function getDenumire()
    {
        return $this->denumire;
    }

    /**
     * Set localitate
     *
     * @param string $localitate
     *
     * @return Institution
     */
    public function setLocalitate($localitate)
    {
        $this->localitate = $localitate;

        return $this;
    }

    /**
     * Get localitate
     *
     * @return string
     */
    public function getLocalitate()
    {
        return $this->localitate;
    }

    /**
     * Set localitateSuperioara
     *
     * @param string $localitateSuperioara
     *
     * @return Institution
     */
    public function setLocalitateSuperioara($localitateSuperioara)
    {
        $this->localitateSuperioara = $localitateSuperioara;

        return $this;
    }

    /**
     * Get localitateSuperioara
     *
     * @return string
     */
    public function getLocalitateSuperioara()
    {
        return $this->localitateSuperioara;
    }

    /**
     * Set strada
     *
     * @param string $strada
     *
     * @return Institution
     */
    public function setStrada($strada)
    {
        $this->strada = $strada;

        return $this;
    }

    /**
     * Get strada
     *
     * @return string
     */
    public function getStrada()
    {
        return $this->strada;
    }

    /**
     * Set numar
     *
     * @param string $numar
     *
     * @return Institution
     */
    public function setNumar($numar)
    {
        $this->numar = $numar;

        return $this;
    }

    /**
     * Get numar
     *
     * @return string
     */
    public function getNumar()
    {
        return $this->numar;
    }

    /**
     * Set codPostal
     *
     * @param string $codPostal
     *
     * @return Institution
     */
    public function setCodPostal($codPostal)
    {
        $this->codPostal = $codPostal;

        return $this;
    }

    /**
     * Get codPostal
     *
     * @return string
     */
    public function getCodPostal()
    {
        return $this->codPostal;
    }

    /**
     * Set statut
     *
     * @param string $statut
     *
     * @return Institution
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return string
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set tipUnitate
     *
     * @param string $tipUnitate
     *
     * @return Institution
     */
    public function setTipUnitate($tipUnitate)
    {
        $this->tipUnitate = $tipUnitate;

        return $this;
    }

    /**
     * Get tipUnitate
     *
     * @return string
     */
    public function getTipUnitate()
    {
        return $this->tipUnitate;
    }

    /**
     * Set unitatePj
     *
     * @param string $unitatePj
     *
     * @return Institution
     */
    public function setUnitatePj($unitatePj)
    {
        $this->unitatePj = $unitatePj;

        return $this;
    }

    /**
     * Get unitatePj
     *
     * @return string
     */
    public function getUnitatePj()
    {
        return $this->unitatePj;
    }

    /**
     * Set modFunctionare
     *
     * @param string $modFunctionare
     *
     * @return Institution
     */
    public function setModFunctionare($modFunctionare)
    {
        $this->modFunctionare = $modFunctionare;

        return $this;
    }

    /**
     * Get modFunctionare
     *
     * @return string
     */
    public function getModFunctionare()
    {
        return $this->modFunctionare;
    }

    /**
     * Set formaFinantare
     *
     * @param string $formaFinantare
     *
     * @return Institution
     */
    public function setFormaFinantare($formaFinantare)
    {
        $this->formaFinantare = $formaFinantare;

        return $this;
    }

    /**
     * Get formaFinantare
     *
     * @return string
     */
    public function getFormaFinantare()
    {
        return $this->formaFinantare;
    }

    /**
     * Set formaProprietate
     *
     * @param string $formaProprietate
     *
     * @return Institution
     */
    public function setFormaProprietate($formaProprietate)
    {
        $this->formaProprietate = $formaProprietate;

        return $this;
    }

    /**
     * Get formaProprietate
     *
     * @return string
     */
    public function getFormaProprietate()
    {
        return $this->formaProprietate;
    }

    /**
     * Set codFiscal
     *
     * @param string $codFiscal
     *
     * @return Institution
     */
    public function setCodFiscal($codFiscal)
    {
        $this->codFiscal = $codFiscal;

        return $this;
    }

    /**
     * Get codFiscal
     *
     * @return string
     */
    public function getCodFiscal()
    {
        return $this->codFiscal;
    }

    /**
     * Set judet
     *
     * @param string $judet
     *
     * @return Institution
     */
    public function setJudet($judet)
    {
        $this->judet = $judet;

        return $this;
    }

    /**
     * Get judet
     *
     * @return string
     */
    public function getJudet()
    {
        return $this->judet;
    }

    /**
     * Set dataModificarii
     *
     * @param string $dataModificarii
     *
     * @return Institution
     */
    public function setDataModificarii($dataModificarii)
    {
        $this->dataModificarii = $dataModificarii;

        return $this;
    }

    /**
     * Get dataModificarii
     *
     * @return string
     */
    public function getDataModificarii()
    {
        return $this->dataModificarii;
    }

    /**
     * Set dataAcreditarii
     *
     * @param string $dataAcreditarii
     *
     * @return Institution
     */
    public function setDataAcreditarii($dataAcreditarii)
    {
        $this->dataAcreditarii = $dataAcreditarii;

        return $this;
    }

    /**
     * Get dataAcreditarii
     *
     * @return string
     */
    public function getDataAcreditarii()
    {
        return $this->dataAcreditarii;
    }

    /**
     * Set dataIntrariiInVigoare
     *
     * @param string $dataIntrariiInVigoare
     *
     * @return Institution
     */
    public function setDataIntrariiInVigoare($dataIntrariiInVigoare)
    {
        $this->dataIntrariiInVigoare = $dataIntrariiInVigoare;

        return $this;
    }

    /**
     * Get dataIntrariiInVigoare
     *
     * @return string
     */
    public function getDataIntrariiInVigoare()
    {
        return $this->dataIntrariiInVigoare;
    }

    /**
     * Set dataInchiderii
     *
     * @param string $dataInchiderii
     *
     * @return Institution
     */
    public function setDataInchiderii($dataInchiderii)
    {
        $this->dataInchiderii = $dataInchiderii;

        return $this;
    }

    /**
     * Get dataInchiderii
     *
     * @return string
     */
    public function getDataInchiderii()
    {
        return $this->dataInchiderii;
    }

    /**
     * Set telefon
     *
     * @param string $telefon
     *
     * @return Institution
     */
    public function setTelefon($telefon)
    {
        $this->telefon = $telefon;

        return $this;
    }

    /**
     * Get telefon
     *
     * @return string
     */
    public function getTelefon()
    {
        return $this->telefon;
    }

    /**
     * Set fax
     *
     * @param string $fax
     *
     * @return Institution
     */
    public function setFax($fax)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * Get fax
     *
     * @return string
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Institution
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }
    /**
     * @var string
     */
    private $adresa_concatenata;

    /**
     * @var array
     */
    private $geo_json;

    /**
     * @var string
     */
    private $lat;

    /**
     * @var string
     */
    private $long;


    /**
     * Set adresaConcatenata
     *
     * @param string $adresaConcatenata
     *
     * @return Institution
     */
    public function setAdresaConcatenata($adresaConcatenata)
    {
        $this->adresa_concatenata = $adresaConcatenata;

        return $this;
    }

    /**
     * Get adresaConcatenata
     *
     * @return string
     */
    public function getAdresaConcatenata()
    {
        return $this->adresa_concatenata;
    }

    /**
     * Set geoJson
     *
     * @param array $geoJson
     *
     * @return Institution
     */
    public function setGeoJson($geoJson)
    {
        $this->geo_json = $geoJson;

        return $this;
    }

    /**
     * Get geoJson
     *
     * @return array
     */
    public function getGeoJson()
    {
        return $this->geo_json;
    }

    /**
     * Set lat
     *
     * @param string $lat
     *
     * @return Institution
     */
    public function setLat($lat)
    {
        $this->lat = $lat;

        return $this;
    }

    /**
     * Get lat
     *
     * @return string
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * Set long
     *
     * @param string $long
     *
     * @return Institution
     */
    public function setLong($long)
    {
        $this->long = $long;

        return $this;
    }

    /**
     * Get long
     *
     * @return string
     */
    public function getLong()
    {
        return $this->long;
    }
    /**
     * @var string
     */
    private $lng;


    /**
     * Set lng
     *
     * @param string $lng
     *
     * @return Institution
     */
    public function setLng($lng)
    {
        $this->lng = $lng;

        return $this;
    }

    /**
     * Get lng
     *
     * @return string
     */
    public function getLng()
    {
        return $this->lng;
    }
    /**
     * @var \DateTime
     */
    private $updatedAt;


    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Institution
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
    /**
     * @ORM\PreUpdate
     */
    public function setUpdatedAtValue()
    {
        $this->setUpdatedAt(new \DateTime('now'));
    }
}
