<?php
namespace joseayram;

/**
 *
 * Implements the WebinarJam API
 *
 */
class WebinarJam
{
    protected const API_URL = 'https://webinarjam.genndi.com/api/';

    protected const CURL_OPTIONS = [
        CURLOPT_CONNECTTIMEOUT => 10,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT        => 60,
    ];

    /**
     * WebinarJam API Key
     * @var string
     */
    protected $apiKey;

    /**
     * WebinarJam Class Constructor
     *
     * @param  string $apiKey WebinarJam API Key
     */
    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * Get details about one particular webinar from your account
     *
     * @param  string $endpoint WebinarJam API EndPoint
     * @return array $jsonResults
     */
    protected function authenticatedCall(string $endpoint, array $params = []): array
    {
        $ch = curl_init(self::API_URL . $endpoint);

        if (empty($this->apiKey)) {
            throw new \Exception('You must specify a valid WebinarJam API Key');
        }

        $params['api_key'] = $this->apiKey;
        curl_setopt_array($ch, self::CURL_OPTIONS);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        $result = curl_exec($ch);

        if ($result === false) {
            $error = curl_error($ch);
            curl_close($ch);
            throw new \Exception($error);
        }

        curl_close($ch);
        $isReturnArray = true;
        $jsonResults = json_decode($result, $isReturnArray);

        if (!is_array($jsonResults)) {
            throw new \Exception($result);
        }

        return $jsonResults;
    }

    /**
     * Retrieve a full list of all webinars published in your account
     * @return array Webinar List
     */
    public function getWebinars(): ?array
    {
        return $this->authenticatedCall('webinars');
    }

    /**
     * Get details about one particular webinar from your account
     *
     * @param  string $webinarId Webinar ID
     * @return array $webinar Webinar Details
     */
    public function getWebinar(string $webinarId): ?array
    {
        return $this->authenticatedCall('webinar', ['webinar_id' => $webinarId]);
    }

    /**
     * Register a person to a specific webinar
     *
     * @param string      $webinarId   Webinar ID (required)
     * @param string      $first_name  First Name (required)
     * @param string      $email       E-mail (required)
     * @param int|integer $schedule    Schedule (required)
     * @param string|null $last_name   Last Name (optional)
     * @param string|null $ipAddress   IP Address (optional)
     * @param string|null $countryCode Country Code (optional)
     * @param string|null $phone       Phone (optional)
     * @return array $webinar Webinar Details
     */
    public function addToWebinar(
        string $webinarId,
        string $first_name,
        string $email,
        int $schedule = 0,
        string $last_name = null,
        string $ipAddress = null,
        string $countryCode = null,
        string $phone = null
    ): array
    {
        $params = [
            'webinar_id' => $webinarId,
            'first_name' => $first_name,
            'email' => $email,
            'schedule' => $schedule
        ];

        if ($last_name != null) {
            $params['last_name'] = $last_name;
        }

        if ($ipAddress != null) {
            $params['ip_address'] = $ipAddress;
        }

        if ($countryCode != null) {
            $params['phone_country_code'] = $countryCode;
        }

        if ($phone != null) {
            $params['phone'] = $phone;
        }

        return $this->authenticatedCall('register', $params);
    }
}
