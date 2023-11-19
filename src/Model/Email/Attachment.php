<?php

namespace MessengerOS\MessengerOS\Model\Email;

class Attachment implements \JsonSerializable
{
    private ?string $fileName = null;

    private ?string $file = null;

    public function jsonSerialize(): array
    {
        return [
            'file_name' => $this->getFileName(),
            'file' => $this->getFile()
        ];
    }

    /**
     * @return string|null
     */
    public function getFileName(): ?string
    {
        return $this->fileName;
    }

    /**
     * @param string|null $fileName
     * @return Attachment
     */
    public function setFileName(?string $fileName): Attachment
    {
        $this->fileName = $fileName;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFile(): ?string
    {
        return $this->file;
    }

    /**
     * @param string|null $file
     * @return Attachment
     */
    public function setFile(?string $file): Attachment
    {
        $this->file = $file;
        return $this;
    }
}