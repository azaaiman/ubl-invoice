<?php

namespace NumNum\UBL;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class FinancialInstitution implements XmlSerializable
{
    private $id;
    private $idAttributes = [];

    /**
     * @return string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return FinancialInstitution
     */
    public function setId(?string $id, $attributes = null): FinancialInstitution
    {
        $this->id = $id;
        if (isset($attributes)) {
            $this->idAttributes = $attributes;
        }
        return $this;
    }

    public function xmlSerialize(Writer $writer): void
    {
        $writer->write([
            'name' => Schema::CBC . 'ID',
            'value' => $this->id,
            'attributes' => $this->idAttributes
        ]);
    }
}
