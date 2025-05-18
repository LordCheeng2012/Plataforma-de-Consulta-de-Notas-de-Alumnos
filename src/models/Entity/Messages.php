<?php

class MessageHandler {
    private array $messages = [];

    /**
     * Agrega un mensaje al manejador.
     *
     * @param string $type Tipo de mensaje (INFO, WARNING, ERROR, SUCCESS, etc.).
     * @param string $message Contenido del mensaje.
     */
    public function addMessage(string $type, string $message,$Data,$status): void {
        $this->messages[] = [
            'type' => strtoupper($type),
            'message' => $message,
            'Status'=>$status,
            "Data"=>$Data,
            'timestamp' => date('Y-m-d H:i:s')
        ];
    }


    /**
     * Obtiene todos los mensajes almacenados.
     *
     * @return array Lista de mensajes.
     */
    public function getMessages(): array {
        return $this->messages;
    }

    /**
     * Obtiene los mensajes filtrados por tipo.
     *
     * @param string $type Tipo de mensaje a filtrar.
     * @return array Lista de mensajes filtrados.
     */
    public function getMessagesByType(string $type): array {
        return array_filter($this->messages, function ($msg) use ($type) {
            return $msg['type'] === strtoupper($type);
        });
    }

    /**
     * Limpia todos los mensajes almacenados.
     */
    public function clearMessages(): void {
        $this->messages = [];
    }

    /**
     * Devuelve los mensajes formateados como una cadena.
     *
     * @return string Mensajes formateados.
     */
    public function formatMessages(): string {
        $formatted = "";
        foreach ($this->messages as $msg) {
            $formatted .= "[{$msg['timestamp']}][{$msg['type']}]: {$msg['message']}\n";
        }
        return $formatted;
    }
}
?>