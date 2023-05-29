<?php

namespace NumNum\UBL;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class Country implements XmlSerializable
{
    private $identificationCode;
    private $listId = 'ISO3166-1:Alpha2';
    private $listAgencyId;

    /**
     * @return mixed
     */
    public function getIdentificationCode(): ?string
    {
        return $this->identificationCode;
    }

    /**
     * @param mixed $identificationCode
     * @return Country
     */
    public function setIdentificationCode(?string $identificationCode): Country
    {
        $this->identificationCode = $identificationCode;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getListId(): ?string
    {
        return $this->listId;
    }

    /**
     * @param mixed $listId
     * @return Country
     */
    public function setListId(?string $listId): Country
    {
        $this->listId = $listId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getListAgencyId()
    {
        return $this->listAgencyId;
    }

    /**
     * @param mixed $listAgencyId
     */
    public function setListAgencyId($listAgencyId): Country
    {
        $this->listAgencyId = $listAgencyId;
        return $this;
    }

    /**
     * The xmlSerialize method is called during xml writing.
     *
     * @param Writer $writer
     * @return void
     */
    public function xmlSerialize(Writer $writer): void
    {
        $attributes = [];

        if (!empty($this->listId)) {
            $attributes['listID'] = $this->listId;
        }
        if (!empty($this->listAgencyId)) {
            $attributes['listAgencyID'] = $this->listAgencyId;
        }

        $writer->write([
            'name' => Schema::CBC . 'IdentificationCode',
            'value' => $this->identificationCode,
            'attributes' => $attributes
        ]);
    }
}
