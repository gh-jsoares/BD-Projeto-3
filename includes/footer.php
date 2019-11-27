        
                </div> 
            </div>
        </div>

        <script src="<?= getAsset('js/jquery.min.js') ?>"></script>
        <script src="<?= getAsset('js/bootstrap.min.js') ?>"></script>
        <script src="<?= getAsset('js/moment.min.js') ?>"></script>
        <script type="text/javascript">
            $(() => {
                $('.datetimepicker').each((i, el) => $(el).datetimepicker({ locale: 'pt' }))
            })

            moment.locale('pt')
            $('.timestamp').each((i, el) => {
                let time = moment($(el).text())
                $(el).text(time.fromNow())
            })
        </script>
    </body>
</html>