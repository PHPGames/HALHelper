<?php
/**
 * HAL.php
 *
 * Ariel Ferrandini <arielferrandini@gmail.com>
 * 27/09/14
 */

namespace PHPGames\Console\Helper;

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Helper\Helper;
use Symfony\Component\Console\Output\OutputInterface;

class HAL
{
    /**
     * @var OutputInterface
     */
    private $output;

    /**
     * @var bool
     */
    private $center;

    /**
     * @var bool
     */
    private $showText;

    /**
     * @var array
     */
    private $screenSize;

    /**
     * @param OutputInterface $output
     * @param bool            $center
     */
    public function __construct(OutputInterface $output, $showText = true, $center = true)
    {
        $this->output = $output;
        $this->showText = (bool)$showText;
        $this->center = (bool)$center;

        if ($this->center) {
            $application = new Application();
            $this->screenSize = $application->getTerminalDimensions();
            unset($application);

            // If the screen size is 0 disable the center flag
            if (!$this->screenSize[0]) {
                $this->center = false;
            }
        }
    }

    /**
     * Writes HAL Logo
     */
    public function sayHello()
    {
        $text = $this->getHALLogo();

        if ($this->showText) {
            $text .= $this->getHelloDave();
        }

        $lines = explode("\n", $text);

        $spaces = '';
        if ($this->center) {
            $max_length = 0;
            foreach ($lines as $line) {
                $max_length = max($max_length, Helper::strlenWithoutDecoration($this->output->getFormatter(), $line));
            }

            $numberOfSpaces = floor(($this->screenSize[0] - $max_length) / 2);
            if ($numberOfSpaces > 0) {
                $spaces = str_repeat(' ', $numberOfSpaces);
            }
        }

        foreach ($lines as $line) {
            $this->output->writeln($spaces.$line);
        }
    }

    /**
     * Returns the HALLogo text
     * @return string
     */
    private function getHALLogo()
    {
        $spaces = '';
        if ($this->showText) {
            $spaces = str_repeat(' ', 35);
        }

        $halLogo = "
$spaces                  <bg=white>          </bg=white>
$spaces           <bg=white>                        </bg=white>
$spaces       <bg=white>      </bg=white>                    <bg=white>      </bg=white>
$spaces     <bg=white>      </bg=white>       <bg=red>          </bg=red>       <bg=white>      </bg=white>
$spaces    <bg=white>    </bg=white>    <bg=red>                    </bg=red>     <bg=white>    </bg=white>
$spaces  <bg=white>   </bg=white>     <bg=red>                        </bg=red>     <bg=white>    </bg=white>
$spaces  <bg=white>   </bg=white>    <bg=red>                            </bg=red>    <bg=white>   </bg=white>
$spaces <bg=white>   </bg=white>    <bg=red>                              </bg=red>    <bg=white>   </bg=white>
$spaces <bg=white>   </bg=white>   <bg=red>                                </bg=red>    <bg=white>  </bg=white>
$spaces<bg=white>   </bg=white>    <bg=red>              <bg=yellow>    </bg=yellow>              </bg=red>    <bg=white>   </bg=white>
$spaces<bg=white>   </bg=white>    <bg=red>              <bg=yellow>    </bg=yellow>              </bg=red>    <bg=white>   </bg=white>
$spaces <bg=white>  </bg=white>    <bg=red>                                </bg=red>    <bg=white>  </bg=white>
$spaces <bg=white>   </bg=white>    <bg=red>                              </bg=red>    <bg=white>   </bg=white>
$spaces  <bg=white>   </bg=white>    <bg=red>                            </bg=red>    <bg=white>   </bg=white>
$spaces  <bg=white>   </bg=white>     <bg=red>                        </bg=red>     <bg=white>    </bg=white>
$spaces    <bg=white>    </bg=white>      <bg=red>                  </bg=red>       <bg=white>   </bg=white>
$spaces     <bg=white>    </bg=white>       <bg=red>            </bg=red>        <bg=white>    </bg=white>
$spaces       <bg=white>      </bg=white>                   <bg=white>      </bg=white>
$spaces           <bg=white>                         </bg=white>
$spaces                  <bg=white>           </bg=white>
";


        return $halLogo;
    }

    /**
     * Returns the HELO DAVE text
     * @return string
     */
    private function getHelloDave()
    {
        return "

                                                                                                           <options=blink>:#######'</options=blink>
 @      :@ @@@@@@@@@ :@         @         +@@@@@@@@;         .@@@@@@@@+   @@@@@@@   @@@     @. @@@@@@@@@  <options=blink>+@@@@@@@@@@</options=blink>
,@.     #@ @@@@@@@@@ @@        `@.        @@@@@@@@@@         #@@@@@@@@@  ;@@@@@@@.  @@@`    @',@@@@@@@@@  <options=blink>@@@@@@@@@@@</options=blink>
,@.     #@ @:        #@        `@.        @@    #@@@         #@      @@  ;@    `@.  @@@`    @',@.         <options=blink>@@@@@@@@@@@</options=blink>
,@,     #@ @:        #@        `@.        @@    #@@@         #@      @@  ;@    `@.  @@@`    @',@.         <options=blink>@@@@@@@@@@@</options=blink>
,@.     #@ @@##@@@@+ #@        `@.        @@    #@@@         #@      @@  '@#####@#; @@@.  ,@@',@###@@@@'  <options=blink>@@@@@@@@@@@</options=blink>
,@@@@@@@@@ @@@@@@@@@ #@        `@.        @@    '@@@         #@      @@  ;@@@@@@@@@ @@@`  @@@;,@@@@@@@@@  <options=blink>@@@@@@@@@@@</options=blink>
:@@@@@@@@@ @@@       #@@@      `@@@       @@      @@         @@@+    @@ @@@      @@  .@.  @@  ,@@@        <options=blink>@@@@@@@@@@@</options=blink>
:@@@    #@ @@@       #@@@      `@@@       @@      @@         @@@#    @@ @@@      @@  .@.  @@  ,@@@        <options=blink>@@@@@@@@@@@</options=blink>
:@@@    #@ @@@       #@@@      `@@@       @@      @@         @@@#    @@ @@@      @@  .@.  @@  ,@@@        <options=blink>@@@@@@@@@@@</options=blink>
:@@@    #@ @@@       #@@@      `@@@       @@      @@         @@@#    @@ @@@      @@  .@`  @@  ,@@@        <options=blink>@@@@@@@@@@@</options=blink>
:@@@    #@ @@@@@@@@@ #@@@@@@@@@`@@@@@@@@@ @@@@@@@@@@         @@@@@@@@@@ @@@      @@  .@@@@@@  ,@@@@@@@@@  <options=blink>@@@@@@@@@@@</options=blink>
 '',     ' '';;'''''  ''''''''` ''''''''' ,####+'''.         .@@@@#'''; ;''      .;   ';;;;,   '';;'''''   <options=blink>@@@@@@@@@:</options=blink>
";
    }
}
