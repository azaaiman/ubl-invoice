<?php

namespace NumNum\UBL;

use Sabre\Xml\Writer;
use Sabre\Xml\XmlSerializable;

class FinancialInstitutionBranch implements XmlSerializable
{
    private $id;

    private $financialInstitution;

    /**
     * @return string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return FinancialInstitutionBranch
     */
    public function setId(?string $id): FinancialInstitutionBranch
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return FinancialInstitution|null
     */
    public function getFinancialInstitution()
    {
        return $this->financialInstitution;
    }

    /**
     * @param FinancialInstitution|null $financialInstitution
     */
    public function setFinancialInstitution(FinancialInstitution $financialInstitution): FinancialInstitutionBranch
    {
        $this->financialInstitution = $financialInstitution;
        return $this;
    }

    public function xmlSerialize(Writer $writer): void
    {
        if (isset($this->id)) {
            $writer->write([
                Schema::CBC . 'ID' => $this->id
            ]);
        }

        if (isset($this->financialInstitution)) {
            $writer->write([
                Schema::CAC . 'FinancialInstitution' => $this->financialInstitution
            ]);
        }
    }
}
