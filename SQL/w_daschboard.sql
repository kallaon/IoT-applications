CREATE ALGORITHM = UNDEFINED DEFINER = `root`@`localhost` SQL SECURITY DEFINER VIEW `w_dashboard` AS SELECT
                `dashboard`.`id` AS `id`,
                `dashboard`.`user_id` AS `user_id`,
                `dashboard`.`device_id` AS `device_id`,
                `dashboard`.`type_id` AS `type_id`,
                `dashboard`.`updated_at` AS `updated_at`,
                `dashboard`.`created_at` AS `created_at`,
                `dashboard_type`.`name` AS `name`,
                `dashboard_type`.`style` AS `style`,
                `dashboard_type`.`icon` AS `icon`,
                `dashboard_type`.`text` AS `text`,
                `dashboard_type`.`size` AS `size`,
                `device`.`device_name` AS `device_name`,
                `type`.`unit` AS `unit`
FROM
                (
                               (
                                               (
                                                               `dashboard`
                                                               JOIN `dashboard_type` ON (
                                                                               (
                                                                                              `dashboard`.`type_id` = `dashboard_type`.`id`
                                                                               )
                                                               )
                                               )
                                               JOIN `device` ON (
                                                               (
                                                                               `dashboard`.`device_id` = `device`.`id_device`
                                                               )
                                               )
                               )
                               JOIN `type` ON (
                                               (
                                                               `device`.`id_type` = `type`.`id_type`
                                               )
                               )
                )