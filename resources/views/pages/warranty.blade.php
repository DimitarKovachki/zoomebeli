@extends('layout.index')
@section('content')

    <main class="terms">
        <div class="header-pages">
            <h1>Гаранционни условия</h1>
        </div>
        @include('layouts.breadcrumb')
        <div class="container container-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <div class="wrapper-terms">
                        <h3>
                            УВАЖАЕМИ КЛИЕНТИ,
                            Във връзка със спазването на вашите права и съблюдавайки Закона за защита на потребителите за
                            нас е важно да знаете, че според:</h3>
                        <div>
                            <ul>
                                <li>
                                    Чл. 112 </br>(1) При несъответствие на потребителската стока с договора за продажба
                                    потребителят има право да предяви рекламация, като поиска от продавача да приведе
                                    стоката в съответствие с договора за продажба. В този случай потребителят може да избира
                                    между извършване на ремонт на стоката или замяната и с нова, освен ако това е невъзможно
                                    или избраният от него начин за обезщетение е непропорционален в сравнение с другия.
                                    </br>(2) Смята се, че даден начин за обезщетяване на потребителя е непропорционален, ако
                                    неговото използване налага разходи на продавача, който в сравнение с другия начин на
                                    обезщетяване са неразумни, като се вземат предвид:
                                    <ul style="list-style-type: decimal">
                                        <li>
                                            стойността на потребителската стока, ако нямаше липса на несъответствие;
                                        </li>
                                        <li>
                                            значимостта на несъответствието;
                                        </li>
                                        <li>
                                            възможността да се предложи на потребителя друг начин на обезщетяване, който не
                                            е свързан със значителни неудобства за него.
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    Чл. 113 
                                    </br>(1) Когато потребителската стока не съответства на договора за продажба,
                                    продавачът е длъжен да я приведе в съответствие с договора за продажба.
                                    </br>(2) Привеждането на потребителската стока в съответствие с договора за продажба трябва
                                    да се извърши в рамките на един месец, считано от предявяването на рекламацията от
                                    потребителя.
                                    </br>(3) След изтичането на срока по ал. 2 потребителят има право да развали договора и да
                                    му бъде възстановена заплатената сума или да иска намаляване на цената на потребителската
                                    стока съгласно чл. 114
                                    </br>(4) Привеждането на потребителската стока в съответствие с договора за продажба е
                                    безплатно за потребителя. Той не дължи разходи за експедиране на потребителската стока или
                                    за материали и труд, свързани с ремонта й, и не трябва да понася значителни неудобства.
                                    </br>(5) Потребителят може да иска и обезщетение за претърпените вследствие на
                                    несъответствието вреди.
                                </li>
                            </ul>

                            <ul>
                                <li>
                                    Чл. 114
                                    </br>(1) При несъответствие на потребителската стока с договора за продажба и когато
                                    потребителят не е удовлетворен от решаването на рекламацията по чл. 113, той има право на избор
                                    между една от следните възможности:
                                    <ul style="list-style-type: decimal">
                                        <li>
                                            Разваляне на договора и възстановяване на заплатената от него сума;
                                        </li>
                                        <li>
                                            Намаляване на цената.
                                        </li>
                                    </ul>
                                    </br>(2) Потребителят не може да претендира за възстановяване на заплатената сума или за намаляване
                                    цената на стоката, когато търговецът се съгласи да бъде извършена замяна на потребителската
                                    стока с нова или да се поправи стоката в рамките на един месец от предявяване на рекламацията от
                                    потребителя.
                                    </br>(3) Търговецът е длъжен да удовлетвори искане за разваляне на договора и да възстанови
                                    заплатената от потребителя сума, когато след като е удовлетворил три рекламации на потребителя
                                    чрез извършване на ремонт на една и съща стока, в рамките на срока на гаранцията по чл. 115, е
                                    налице следваща поява на несъответствие на стоката с договора за продажба.
                                    </br>(4) Потребителят не може да претендира за разваляне на договора, ако несъответствието на
                                    потребителската стока с договора е незначително.
                                </li>
                            </ul>
                            <ul>
                                <li>
                                    Чл. 115
                                    </br>(1) Потребителят може да упражни правото си по този раздел в срок до две години, считано
                                    от доставянето на потребителската стока.
                                    </br>(2) Срокът по ал. 1 спира да тече през времето, необходимо за поправката или замяната на
                                    потребителската стока или за постигане на споразумение между продавача и потребителя за решаване
                                    на спора.
                                    </br>(3) Упражняването на правото на потребителя по ал. 1 не е обвързано с никакъв друг срок за
                                    предявяване на иск, различен от срока по ал. 1.
                                </li>
                            </ul>
                            <ul >
                                <li>
                                    Чл. 119 
                                    </br>(1) Заявлението за предоставяне на търговска гаранция съдържа задължително информация
                                    за:
                                    <ul style="list-style-type: decimal">
                                        <li>
                                            Правата на потребителите, произтичащи от гаранцията по чл. 112 – 115, и посочва ясно, че
                                            търговската гаранция не оказва влияние върху правата на потребителите, произтичащи от гаранцията
                                            по чл. 112 – 115, и по – точно, че независимо от търговската гаранция продавачът отговаря за
                                            липсата на съответствие на потребителската стока с договора за продажба съгласно гаранцията по
                                            чл. 112 – 115;
                                        </li>
                                        <li>
                                            Съдържанието и обхвата на търговската гаранция;
                                        </li>
                                        <li>
                                            Съществените елементи, необходими за нейното прилагане и по – специално: начините за предявяване
                                            на рекламации; срок на търговската гаранция; териториален обхват на търговската гаранция; име и
                                            адрес на лицето предоставящо търговската гаранция, и име и адрес на лицето, пред което може да
                                            бъде предявена търговската гаранция, когато това лице е различно от лицето, предоставящо
                                            търговската гаранция.
                                        </li>
                                    </ul>
                                    </br>(2) В случай, че търговската гаранция се предоставя от производител, който няма представител на
                                    територията на страната, и в заявлението за предоставяне на търговска гаранция липсва информация
                                    по ал. 1, т. 1, тази информация се предоставя на потребителя по подходящ начин от продавача.
                                    </br>(3) Информацията по ал. 1 трябва да бъде ясна, разбираема и лесна за четене. Информацията
                                    задължително се предоставя на български език.
                                    </br></br>Съгласно Закона за защита на потребителите и Европейска директива 1999/44/СЕ производителят
                                    предоставя две години гаранция на произведения от него продукт.
                                    </br></br>В предвид високото качество на влаганите материали собствено производство или от доказани
                                    производители, Зоомебели ООД предоставя пълната търговска гаранция на своите потребители.
                                    </br></br><strong>ГАРАНЦИЯТА ПОКРИВА</strong>
                                    <ul style="list-style-type: decimal">
                                        <li>
                                            Всички изделия произведени от Зоомебели ООД, които в гаранционния срок при нормална употреба са
                                            показали скрити производствени дефекти.
                                        </li>
                                        <li>
                                            Различие на закупения продукт с отбелязания на индивидуалния етикет модел. Несъответствие на
                                            размерите на закупения продукт с предварително упоменатите с повече от 1 % в ширина, дължина и
                                            дебелина.
                                        </li>
                                        <li>
                                            Несъответствие проявило се по време на експлоатацията в рамките на гаранционния период
                                            изразяващо се в необратима еластична деформация с повече от 2 сантиметра от прекараната права
                                            най – външна линия на пропадналия елемент и е в резултат от нормална експлоатация.
                                        </li>
                                    </ul>
                                </br><strong>ГАРАНЦИЯТА НЕ ПОКРИВА</strong>
                                <ul style="list-style-type: decimal">
                                    <li>
                                        Дефекти, причинени от клиента поради невнимателно транспортиране или неправилна употреба.
                                    </li>
                                    <li>
                                        Дефекти, появили се в резултат на външно влияние, механични повреди, повишена влажност, опити за
                                        поправка и др. причинени от клиента или трети лица.
                                    </li>
                                    <li>
                                        Дефекти, появили се в резултат на продължително складиране, почистване на продукта с абразивни
                                        или неподходящи препарати, от домашни любимци и др.
                                    </li>
                                    <li>
                                        Несъответствия, получени в резултат на съхранение или ползване при неестествени условия на
                                        замърсяване или влага.
                                    </li>
                                    <li>
                                        Очакваното износване на външната част дължащо се на естественото въздействие на експлоатацията
                                        във времето.
                                    </li>
                                    <li>
                                        Визуални промени в възглавниците с гранулиран пълнеж или пух дължащи се на естествената
                                        експлоатация и отстраняващо се при домашни условия.
                                    </li>
                                    <li>
                                        Рекламации когато клиента не е в състояние да предостави необходимите документи: касова бележка
                                        или копие и номер на поръчка.
                                    </li>
                                </ul>
                                    
                                </li>
                            </ul>
                          
                          

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
